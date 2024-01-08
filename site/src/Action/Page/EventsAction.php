<?php
namespace App\Action\Page;

class EventsAction extends CoreAction
{
	public function invoke() : void
	{
		$events = [
			[
				'title' => 'Women\'s Empowerment Symposium',
				'slug' => 'womens-empowerment-symposium',
				'description' => 'Event 1 description',
				'dates' => [
					[
						'start' => '2021-10-01 00:00:00',
						'end' => '2021-10-01 00:00:00',
						'timezone' => 'America/New_York',
					],
				],
				'recap' => '',
				'organizer' => 'Organizer 1',
				'venue' => [
					'name' => 'Venue 1',
					'address' => 'Address 1',
					'city' => 'City 1',
					'state' => 'State 1',
					'zip' => 'Zip 1',
					'country' => 'Country 1',
					'phone' => 'Phone 1',
					'region' => 'Website 1',
				],
				'website' => 'https://www.google.com',
				'socials' => [
					'facebook' => '',
					'x-twitter' => '',
					'instagram' => '',
					'youtube' => '',
				],
				'tags' => [
					'type' => [],
					'category' => [],
				],
				'quotes' => [],
				'gallery' => [],
				'pinned' => false,
			],
			[
				'title' => 'Gender Equality Summit',
				'slug' => 'gender-equality-summit',

			],
			[
				'title' => 'Breaking the Glass Ceiling Conference',
				'slug' => 'breaking-the-glass-ceiling-conference',
			],
			[
				'title' => 'Feminist Forum',
				'slug' => 'feminist-forum',
			],
			[
				'title' => 'SheSpeaks: Voices of Change',
				'slug' => 'shespeaks-voices-of-change',
			],
			[
				'title' => 'Equality Matters Conference',
				'slug' => 'equality-matters-conference',
			],
			[
				'title' => 'Women\'s Rights Rally',
				'slug' => 'womens-rights-rally',
			],
			[
				'title' => 'Gender and Society Symposium',
				'slug'	=> 'gender-and-society-symposium',
			],
			[
				'title' => 'EmpowerHer: Bridging the Gap',
				'slug' => 'empowerher-bridging-the-gap',
			],
			[
				'title' => 'Women\'s Health and Wellness Expo',
				'slug' => 'womens-health-and-wellness-expo',
			],
			[
				'title' => 'The Diversity Dialogue: Women\'s Edition',
				'slug' => 'the-diversity-dialogue-womens-edition',
			],
			[
				'title' => 'HerStory: Unveiling Untold Narratives',
				'slug' => 'herstory-unveiling-untold-narratives',
			],
			[
				'title' => 'Women\'s Economic Empowerment Forum',
				'slug' => 'womens-economic-empowerment-forum',
			],
			[
				'title' => 'Women\'s Mental Health Awareness Day',
				'slug' => 'womens-mental-health-awareness-day',
			],
			[
				'title' => 'Empowerment through Art and Expression',
				'slug' => 'empowerment-through-art-and-expression',
			],
			[
				'title' => 'International Women\'s Day Celebration',
				'slug' => 'international-womens-day-celebration',
			],
			[
				'title' => 'Advocates for Change: Women\'s Rights Workshop',
				'slug' => 'advocates-for-change-womens-rights-workshop',
			],
			[
				'title' => 'Voices of Resilience: Survivors\' Gathering',
				'title' => 'voices-of-resilience-survivors-gathering',
			],
			[
				'title' => 'Women\'s Leadership Masterclass',
				'slug' => 'womens-leadership-masterclass',
			],
			[
				'title' => 'Generational Equality Workshop',
				'slug' => 'generational-equality-workshop',
			],
			[
				'title' => 'breaking-boundaries-women-in-business',
				'slug' => 'breaking-boundaries-women-in-business'
			],
		];

		$this->getView()->render($this->getResponse(), 'pages/events.php', [
			'pageTitle' => 'Events',
			'pageDescription' => 'Events that empower, engage and entertain.',
			'pageSlug' => 'events',
		]);
	}
}
