<?php

namespace App\Repository;

use App\Service\DigitalOceanSpacesService;
use Cake\Chronos\Chronos;
use League\Flysystem\Filesystem;
use Orhanerday\OpenAi\OpenAi;
use Faker\Factory as Faker;

class EventsRepository implements RepositoryInterface
{
	private array $config;
	private array $Events;

	private Filesystem $fs;

	public function __construct(?Filesystem $fs = null)
	{
		$this->fs = $fs ?? DigitalOceanSpacesService::init("data");

		foreach ($this->fs->listContents('/') as $config) {
			if ($config->type() === 'file' && $this->fs->mimeType($config->path()) === 'application/json' && $config->path() === 'events.json') {
				$config = json_decode($this->fs->read($config->path()), true);
				$this->config = $config;
			}
		}
	}

	public function getStates()
	{
		return $this->config['states'];
	}

	public function getEvents(string $filter = 'all')
	{
		if (key_exists('items', $this->config)) {
			$this->Events = $this->config['items'];
		} else {
			$faker = Faker::create();
			$ai = new OpenAI($_ENV['OPEN_AI_KEY']);

			$response = $ai->completion([
				'model' => 'gpt-3.5-turbo-instruct',
				'prompt' => "Generate a JSON array of 25 names for events that focus on the struggles, issues and related topics relevant to women and girls. Each event should be a separate object in the array and the event name should be added to the 'name' key. Create a slug from this event name in snake case format and add it to a 'slug' key. Also, generate 2 or 3 sentences describing what the event will offer participants based on the event name (add this description to a key called 'decription'). Also, generate a Version 4 UUID for the event and add it to an 'id' key. All key's for each Event object should be formatted as lowercase and kebab case.",
				'temperature' => 0.9,
				'max_tokens' => 3000,
				'frequency_penalty' => 0,
				'presence_penalty' => 0.6,
			]);
			$response = json_decode($response, true);

			if ($this->fs->has('partners.json')) {
				$partners = json_decode($this->fs->read('partners.json'), true);
			} else {
				$response2 = $ai->completion([
					'model' => 'gpt-3.5-turbo-instruct',
					'prompt' => "Generate a JSON array of 12 to 20 organizations with names that reflect a mission of providing social services and support to women and girls. The name of the Organization should be formatted as Title Case and the value for the 'name' key on the JSON object. Also create a one sentence mission statement for each Organization and add it to a roote-level key called 'mission'. Generate a slug in snake case format for each organization using their name and add this to a key called 'slug'. For each organization, generate an id as a Version 4 UUID and set it to the 'id' key and create a fictitious US-based business address and add it to the JSON object under an 'address' key. The 'address' object should have separate keys for street, city, state, and zip. Add an additional key to the address object called 'region' that denotes which region of the country the Organization is located based on their State. Select a region from the following list or regions: Mid-Atlantic, Southern, Northern, Midwest, and Western. Also, at the root of each object, include a key for the timezone the organization is in based on their zip code and output it in the format used by the PHP scripting language's DateTimeZone::AMERICA class. Make sure that the all JSON keys are formatted as lowercase and kebab case.",
					'temperature' => 0.9,
					'max_tokens' => 3000,
					'frequency_penalty' => 0,
					'presence_penalty' => 0.6,
				]);
				$response2 = json_decode($response2, true);
				$response2 = json_decode(preg_replace('/\s+/', ' ', trim($response2['choices'][0]['text'])), true);

				$this->fs->write('partners.json', json_encode($response2));
			}

			$events = json_decode(preg_replace('/\s+/', ' ', trim($response['choices'][0]['text'])), true);

			foreach ($events as $index => $event) {
				$event['organizer'] = $faker->randomElement($partners);

				$venue = json_decode($ai->completion([
					'model' => 'gpt-3.5-turbo-instruct',
					'prompt' => "Return a JSON object with a generated fictitious name for a trendy venue such as a performing arts center, a sports arena, a community center, a restaurant, a bar or club or a public outdoor space. The name should be formatted as Title Case and added to a 'name' key. Also, generate a fictitious US-based address for the location in {$event['organizer']['address']['city']}, {$event['organizer']['address']['state']}. The 'address' object should have separate keys for street, city, state, and zip. Make sure that the all JSON keys are formatted as lowercase and kebab case.",
					'temperature' => 0.9,
					'max_tokens' => 2000,
					'frequency_penalty' => 0,
					'presence_penalty' => 0.6,
				]), true);

				$event['venue'] = json_decode(preg_replace('/\s+/', ' ', trim($venue['choices'][0]['text'])), true);

				$event['venue']['region'] = $event['organizer']['address']['region'];

				// Scheduling

				$event['schedule']['type'] = $faker->randomElement($this->config['scheduling']['types']);

				$schedule = [];

				$start = Chronos::instance($faker->dateTimeInInterval('-6 months', '+1 year'));

				switch ($event['schedule']['type']['name']) {
					case 'recurring':
						$event['schedule']['interval'] = $faker->randomElement($this->config['scheduling']['intervals']);
						switch ($event['schedule']['interval']['id']) {
							case '2b4b6181-8000-4cde-b9d6-4106ae87a878':  // weekly
								// deciding that weekly recurring events are the only ones that can occur over multiple days
								$probability = $faker->numberBetween(0, 100);  // how likely is it that this event will occur on multiple days?
								$days = $probability < 85 ? 1 : $faker->numberBetween(2, 5);

								$start = match ($days) {
									2 => $start->isSunday() ? $start->next(Chronos::MONDAY) : $start, // random day can be any day of the week, except Sunday
									3 => $start->isFriday() && $start->isSaturday() && $start->isSunday() ? $start->next(Chronos::MONDAY) : $start, // random day can only be Monday through Thursday
									4 => !$start->isMonday() && !$start->isTuesday() && !$start->isWednesday() ? $start->next(Chronos::MONDAY) : $start, // random day can only be Monday or Wednesday
									5 => !$start->isMonday() ? $start->next(Chronos::MONDAY) : $start, // random day can only be Monday
									default => $start
								};

								$start = $start->setTime($faker->numberBetween(8, 20), 0, 0);
								$schedule['start'] = $start->toAtomString();
								$schedule['end'] = $start->addHours($faker->numberBetween(1, 6), 0, 0)->toAtomString();
								$schedule['days'] = $days;
								$schedule['duration'] = $faker->randomElement([1, 2, 3, 6, 12]);  // how many months will this occur weekly

								break;

							case '45da27d5-f959-491f-8c3f-a4cc67adc82e':  // bi-weekly
								$start = $start->setTime($faker->numberBetween(8, 20), 0, 0);
								$schedule['start'] = $start->toAtomString();
								$schedule['end'] = $start->addHours($faker->numberBetween(1, 4), 0, 0)->toAtomString();
								$schedule['duration'] = $faker->randomElement([2, 3, 6, 12]);  // how many months will this occur bi-weekly

								break;

							case 'cc3c8a6b-3689-4665-a111-231b62fad078':  // monthly
								$start = $start->setTime($faker->numberBetween(8, 20), 0, 0);
								$schedule['start'] = $start->toAtomString();
								$schedule['end'] = $start->addHours($faker->numberBetween(1, 5), 0, 0)->toAtomString();
								$schedule['duration'] = $faker->randomElement([3, 6, 12]);  // how many months will this occur monthly

								break;
						}
						break;

					case 'multi-day':
						$days = $faker->numberBetween(2, 4);

						$start = match ($days) {
							2 => $start->isSunday() ? $start->next(Chronos::MONDAY) : $start, // random day can be any day of the week, except Sunday
							3 => $start->isFriday() && $start->isSaturday() && $start->isSunday() ? $start->next(Chronos::MONDAY) : $start, // random day can only be Monday through Thursday
							4 => !$start->isMonday() && !$start->isTuesday() && !$start->isWednesday() ? $start->next(Chronos::MONDAY) : $start, // random day can only be Monday or Wednesday
						};

						$start = $start->setTime($faker->numberBetween(8, 20), 0, 0);

						$schedule['start'] = $start->toAtomString();
						$schedule['end'] = $start->addHours($faker->numberBetween(1, 6), 0, 0)->toAtomString();
						$schedule['days'] = $days;

						break;

					default:  // assume this is a one-time event
						$start = $start->setTime($faker->numberBetween(8, 20), 0, 0);
						$schedule['start'] = $start->toAtomString();
						$schedule['end'] = $start->addMinutes(30 * $faker->numberBetween(1, 10))->toAtomString();
						$schedule['days'] = 1;

						break;
				}

				$event['schedule']['dates'] = [];
				$event['schedule']['dates'] = array_merge($event['schedule']['dates'], $schedule);
				$event['schedule']['dates']['timezone'] = $event['organizer']['timezone'];

				/** WEB ESSENTIALS */

				$event['website'] = $faker->domainName();

				$platforms = $faker->randomElements($this->config['social']['platforms'], null);

				foreach ($platforms as $platform) {
					$social = [
						'id' => $faker->uuid(),
						'platform' => $platform,
						'user' => $faker->userName(),
					];

					$social['url'] = $platform['url'] . $social['user'];
					$event['social'][] = $social;
				}

				$events[$index] = $event;
			}

			$this->config['items'] = $events;
			$this->Events = $events;
			$this->fs->write('events.json', json_encode($this->config));
		}

		return $this->Events;
	}
}
