<?php

namespace App\Repository;

use App\Repository\RepositoryInterface;
use App\Service\DigitalOceanSpacesService;
use Cake\Collection\Collection;
use League\Flysystem\Filesystem;

class ResourcesRepository implements RepositoryInterface
{
	private array $Resources;

	private Filesystem $fs;

	public function __construct(?Filesystem $fs = null)
	{
		$this->fs = $fs ?? DigitalOceanSpacesService::init("data");

		foreach ($this->fs->listContents('/') as $data) {
			if ($data->type() === 'file' && $this->fs->mimeType($data->path()) === 'application/json' && $data->path() === 'resources.json') {
				$resources = json_decode($this->fs->read($data->path()), true);
				$this->Resources = $resources;
			}
		}

		ray($this->Resources);
	}

	public function getResources()
	{
		if (isset($this->Resources)) {
			return $this->Resources;
		}

		return $this->Resources;
	}

	public function getResource(string $id = null): array|null
	{
		if ($id) {
			$resources = new Collection($this->getResources());
			$resource = $resources->firstMatch(['slug' => $id]);
		}

		return $resource ?? null;
	}
}
