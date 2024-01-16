<?php
namespace App\Service\Storage;

use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;

class LocalStorageService
{
	static function init(string $rootDir = WEB_ROOT): Filesystem
	{
		return new Filesystem(new LocalFilesystemAdapter(
			$rootDir
		));
	}
}
