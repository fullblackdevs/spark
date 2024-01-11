<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/paths.php';

use Slim\Factory\AppFactory as Application;
use Dotenv\Dotenv;

ray()->clearScreen();

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

\Sentry\init([
	'dsn' => 'https://523c9817a1fc98fdfedfe8768bdfae24@o104948.ingest.sentry.io/4506446586904576',
	'traces_sample_rate' => 1.0,
]);

$app = Application::create();
$routes = require_once dirname(__DIR__) . '/config/routes.php';

$app = $routes($app)->run();
