<?php
namespace App;

use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Dotenv\Dotenv;
use Exception;
use RuntimeException;
use Slim\Factory\AppFactory as SlimAppFactory;
use Slim\App as SlimApp;
use Sentry;

class Application
{
	private SlimApp $app;

	public function __construct(SlimApp $app)
	{
		$this->initialize();
		$app = $this->registerRoutes($app);
		$this->app = $app;
	}

	/**
	 * Initialize Application
	 *
	 * Initializes the application by loading configurations, setting up the database connection, etc.
	 *
	 * @return void
	 */
	private function initialize() : void
	{
		Sentry\init([
			'dsn' => 'https://523c9817a1fc98fdfedfe8768bdfae24@o104948.ingest.sentry.io/4506446586904576',
			'traces_sample_rate' => 1.0,
		]);

		if (!env('APP_NAME') && file_exists(dirname(__DIR__) . '/.env')) {
			$this->loadEnvironmentVariables();
		}

		/** LOAD CONFIGURATION */
		try {
			Configure::config('default', new PhpConfig());
			Configure::load('app', 'default', false);
		} catch (Exception $e) {
			exit($e->getMessage() . "\n");
		}
	}

	/**
	 * Startup Application
	 *
	 * @return SlimApp
	 * @throws RuntimeException
	 */
	public static function startup() : SlimApp
	{
		$app = SlimAppFactory::create();  // create a Slim App instance using the Factory

		return (new Application($app))->getApp();
	}

	/**
	 * Register routes
	 *
	 * Registers routes from config/routes.php
	 *
	 * @param SlimApp $app
	 * @return SlimApp
	 */
	private function registerRoutes(SlimApp $app): SlimApp
    {
		if (!file_exists(CONFIG . 'routes.php')) {
			throw new Exception('Routes file not found.');
		}

		/** @var Closure $routes */
        $routes = require_once CONFIG . 'routes.php';

        return $routes($app);
    }

	private function getApp() : SlimApp
	{
		return $this->app;
	}

	private function loadEnvironmentVariables() : void
	{
		$dotenv = Dotenv::createImmutable(dirname(__DIR__));
		$dotenv->load();
	}
}
