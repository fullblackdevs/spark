<?php

namespace App\Core;

use Dotenv\Dotenv;
use Sentry;

abstract class AbstractApplication
{
	protected function initialize(): void
	{
		$this->initializeSentry();
		$this->initializeEnvironmentVars();
		$this->initializeConfig();
	}

	protected function initializeSentry(): void
	{
		Sentry\init([
			'dsn' => 'https://523c9817a1fc98fdfedfe8768bdfae24@o104948.ingest.sentry.io/4506446586904576',
			'traces_sample_rate' => 1.0,
		]);
	}

	private function initializeEnvironmentVars(): void
	{
		if (!env('APP_NAME') && file_exists(dirname(__DIR__) . '/.env')) {
			$dotenv = Dotenv::createImmutable(dirname(__DIR__));
			$dotenv->load();
		}
	}

	abstract public static function startup();

	abstract protected function initializeConfig();

	abstract public function getApp();
}
