<?php

namespace App\Repository;

use App\Service\DigitalOceanSpacesService;
use Cake\Collection\Collection;
use League\Flysystem\Filesystem;
use Orhanerday\OpenAi\OpenAi;
use Faker\Factory as Faker;

class PartnersRepository extends CoreRepository implements RepositoryInterface
{
	private array $Partners;

	public function __construct(?Filesystem $fs = null)
	{
		parent::__construct();

		$this->Partners = $this->loadContent('partners');
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

	public function getRandonPartner(): array|null
	{
		$partners = new Collection($this->getPartners());
		$partner = $partners->sample(1)->first();

		return $partner ?? null;
	}
}
