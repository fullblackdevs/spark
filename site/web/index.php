<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/paths.php';

use App\Application;

ray()->clearScreen();
$app = (Application::startup())->run();
