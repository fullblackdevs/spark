<?php
namespace App\Module\Content\Repository;

use App\Module\Content\Entity\Contributor;
use App\Repository\CoreRepository;
use App\Repository\RepositoryInterface;
use Cake\Collection\Collection;
use Cake\Collection\CollectionInterface;
use League\Flysystem\Filesystem;

class ContributorsRepository extends CoreRepository implements RepositoryInterface
{
	private array $Contributors;

	/**
	 * Undocumented function
	 *
	 * We don't load content through the constructor so we can make an explicit call
	 * t0 getContributors() when we need it.
	 *
	 * @param Filesystem|null $fs
	 */
	public function __construct(?Filesystem $fs = null)
	{
		parent::__construct();
	}

	public function getContributors() : CollectionInterface
	{
		if (empty($this->Contributors)) {
			$this->Contributors = $this->loadContent('contributors');
		}

		return new Collection($this->Contributors);
	}

	/**
	 * Undocumented function
	 *
	 * @param string|array $id
	 * @return Contributor
	 */
	public function getAuthors(string|array $id = null) : Contributor
	{
		if ($id) {
			$contributors = $this->getContributors();

			$_contributors = $contributors->filter(function ($contributor) use ($id) {
				if (is_array($id)) {
					return in_array($contributor['id'], $id);
				} else {
					return $contributor['id'] === $id;
				}
			});
		}


		return $contributors;
	}
}
