<?php
return [
	'App' => [
		'name' => 'Spark Site Utilities',
		'version' => '0.1.0',
	],
	/** set where to load site data from */
	'Datasources' => [
		'default' => [
			'format' => env('DATASOURCE_FORMAT'),
			'connection' => env('DATASOURCE_CONNECTION'),
		],
		'dev' => [
			'format' => 'json',
			'connection' => 'local',
		],
		'live' => [
			'format' => 'json',
			'connection' => 'aws',
		],
	],

	'Content' => [
		'Repository' => [
			'environment' => env('CONTENT_REPOSITORY_ENVIRONMENT', 'default'),
			'environments' => [
				'default' => [
					'connection' => env('CONTENT_REPOSITORY_SOURCE'),
					'format' => env('CONTENT_REPOSITORY_FORMAT'),
				],
				'dev' => [
					'connection' => 'local',
					'format' => 'json',
				],
				'live' => [
					'connection' => 'digitalocean',
					'format' => 'json',
				],
			],
		],
	],
];
