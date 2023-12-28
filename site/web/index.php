<?php

use Slim\Factory\AppFactory as Application;

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/paths.php';

\Sentry\init([
	'dsn' => 'https://523c9817a1fc98fdfedfe8768bdfae24@o104948.ingest.sentry.io/4506446586904576',
	'traces_sample_rate' => 1.0,
]);

$app = Application::create();
$routes = require_once dirname(__DIR__) . '/config/routes.php';

try {
	$this->functionFailsForSure();
} catch (\Throwable $exception) {
	\Sentry\captureException($exception);
}

$app = $routes($app)->run();
