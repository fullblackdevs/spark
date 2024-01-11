<?php

namespace App\Service;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3V3\AwsS3V3Adapter;
use League\Flysystem\Filesystem;

class DigitalOceanSpacesService
{
	static function init(string $directory = ''): Filesystem
	{
		return new Filesystem(new AwsS3V3Adapter(
			new S3Client([
				'version' => $_ENV['DIGITALOCEAN_SPACES_VERSION'],
				'region' => $_ENV['DIGITALOCEAN_SPACES_REGION'],
				'endpoint' => $_ENV['DIGITALOCEAN_SPACES_ENDPOINT'],
				'credentials' => [
					'key' => $_ENV['DIGITALOCEAN_SPACES_KEY'],
					'secret' => $_ENV['DIGITALOCEAN_SPACES_SECRET'],
				],
			]),
			$_ENV['DIGITALOCEAN_SPACES_BUCKET'],
			$directory,
		));
	}
}
