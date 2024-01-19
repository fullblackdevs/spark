<?php
namespace App\Console;

use App\Core\AbstractApplication;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\JsonConfig;
use Cake\Core\Configure\Engine\PhpConfig;
use Exception;
use Symfony\Component\Console\Application as SymfonyApplication;

class Application extends AbstractApplication
{
	protected string $AppName;

	protected string $AppVersion;

	private SymfonyApplication $App;

    public function __construct()
    {
		$this->initialize();

		$this->AppName = 'Spark Site Utilities';
		$this->AppVersion = Configure::read('App.version');

		$this->App = new SymfonyApplication($this->AppName, $this->AppVersion);
    }

	public static function startup(): SymfonyApplication
	{
		return (new Application())->getApp();
	}

	public function getApp(): SymfonyApplication
	{
		return $this->App;
	}

	protected function initializeConfig()
	{
		try {
			Configure::config('console', new PhpConfig());
			Configure::load('app', 'console', false);
		} catch (Exception $e) {
			exit($e->getMessage() . "\n");
		}
	}
}
