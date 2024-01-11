<?php

namespace App\Repository;

use App\Service\DigitalOceanSpacesService;
use Cake\Collection\Collection;
use League\Flysystem\Filesystem;
use Orhanerday\OpenAi\OpenAi;
use Faker\Factory as Faker;

class PartnersRepository implements RepositoryInterface
{
	private array $Partners;

	private Filesystem $fs;

	public function __construct(?Filesystem $fs = null)
	{
		$this->fs = $fs ?? DigitalOceanSpacesService::init("data");

		foreach ($this->fs->listContents('/') as $data) {
			if ($data->type() === 'file' && $this->fs->mimeType($data->path()) === 'application/json' && $data->path() === 'partners.json') {
				$partners = json_decode($this->fs->read($data->path()), true);
				$this->Partners = $partners;
			}
		}
	}

	public function getPartners()
	{
		if (isset($this->Partners)) {
			return $this->Partners;
		}

		return $this->Partners;
	}

	public function getPartner(string $id = null): array|null
	{
		if ($id) {
			$partners = new Collection($this->getPartners());
			$partner = $partners->firstMatch(['slug' => $id]);
		}

		return $partner ?? null;
	}
}
