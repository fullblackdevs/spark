<?php
namespace App\Module\Content\Repository;

use App\Module\Content\Entity\Page;
use App\Repository\CoreRepository;
use App\Repository\RepositoryInterface;
use Cake\Utility\Hash;
use League\Flysystem\Filesystem;

class PagesRepository extends CoreRepository implements RepositoryInterface
{
	private array $Pages = [];

	public function __construct(?Filesystem $fs = null)
	{
		parent::__construct();
	}

	public function getPages() : array
	{
		if (!empty($this->Pages)) {
			return $this->Pages;
		} else {
			$this->Pages = $this->loadContent('pages');
		}

		return $this->Pages;
	}

	public function getPage(string $name) : Page
	{
		$pages = $this->getPages();

		$page = Hash::extract($pages, '{n}[name=' . $name . ']');

		if (!$page) {
			throw new \Exception('Page not found');
		}

		$page = new Page($page[0]);

		return $page;
	}
}
