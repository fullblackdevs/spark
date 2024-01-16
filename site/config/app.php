<?php
return [
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
];
