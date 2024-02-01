<?php

namespace App\Repository;

use App\Module\Content\Entity\Resource;
use App\Repository\RepositoryInterface;
use App\Service\DigitalOceanSpacesService;
use Cake\Collection\Collection;
use League\Flysystem\Filesystem;
use Cake\Utility\Text;
use Orhanerday\OpenAi\OpenAi;
use Faker\Factory as Faker;

class ResourcesRepository extends CoreRepository implements RepositoryInterface
{
	private array $Resources;

	public function __construct(?Filesystem $fs = null)
	{
		parent::__construct();

		$this->Resources = $this->loadContent('resources');

		$this->Resources = $this->loadAssociatedContent($this->Resources, 'partner');

		foreach ($this->Resources as $index => $resource) {
			// GENERATE SLUG
			if (!isset($resource['slug'])) {
				$this->Resources[$index]['slug'] = strtolower(Text::slug($resource['name']));
			}
		}

		/* foreach ($this->Resources as $index => $resource) {
			// SET ID
			if (!isset($resource['id'])) {
				$resource['id'] = Text::uuid();
			}

			// SET PROVIDER
			if (!isset($resource['provider'])) {
				$resource['provider'] = $this->Providers->getRandonPartner();
			}

			// REORGZANIZE THE DESCRIPTIONS
			if (isset($resource['description-short'])) {
				$blurb = $resource['description-short'];
				unset($resource['description-short']);
				$shortDescription = isset($resource['description']) ? $resource['description'] : null;

				$resource['description'] = [];
				$resource['description']['short'] = $shortDescription;
				$resource['description']['blurb'] = $blurb;
			}

			if (!isset($resource['description']['full'])) {
				$ai = new OpenAI($_ENV['OPEN_AI_KEY']);

				$response = $ai->completion([
					'model' => 'gpt-3.5-turbo-instruct',
					'prompt' => "Given that {$resource['provider']['name']} is a social service organization with a mission to {$resource['provider']['mission']}, generate a description of no less than 200 words about {$resource['name']}, a resource they're providing to support their target audience and mission.",
					'temperature' => 0.9,
					'max_tokens' => 3000,
					'frequency_penalty' => 0,
					'presence_penalty' => 0.6,
				]);

				$response = json_decode($response, true);
				ray($response);
				$resource['description']['full'] = preg_replace('/\s+/', ' ', trim($response['choices'][0]['text']));
				ray($resource['description']['full']);
			}

			// GENERATE SLUG
			if (!isset($resource['slug'])) {
				$resource['slug'] = strtolower(Text::slug($resource['name']));
			}

			$this->Resources[$index] = $resource;
		} */

		//$this->fs->write('resources.json', json_encode($this->Resources));
	}

	public function getResources()
	{
		if (isset($this->Resources)) {
			return $this->Resources;
		}

		return $this->Resources;
	}

	public function getResource(string $id = null): Resource|null
	{
		if ($id) {
			$resources = new Collection($this->getResources());
			$resource = $resources->firstMatch(['slug' => $id]);

			return new Resource($resource);
		}

		return null;
	}
}
