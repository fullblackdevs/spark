<?php
use Slim\Factory\AppFactory as Application;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$app = Application::create();
$routes = require_once dirname(__DIR__) . '/config/routes.php';

$app = $routes($app)->run();
