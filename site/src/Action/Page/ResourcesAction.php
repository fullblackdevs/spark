<?php
namespace App\Action\Page;

use App\Repository\ResourcesRepository;

class ResourcesAction extends CoreAction
{
	private $Resources;

	public function invoke() : void
	{
		$this->Resources = new ResourcesRepository();
		$resources = $this->Resources->getResources();

		$page = $this->Pages->getPage('resources');
		$header = $page->getSection('header');

		$this->getView()->render($this->getResponse(), 'pages/resources.php', [
			'resources' => $resources,
			'pageTitle' => isset($header['title']) ? $header['title'] : 'Title Not Set',
			'pageDescription' => isset($header['description']) ? $header['description'] : 'Description Not Set',
			'pageHeaderImage' => isset($header['image']) ? $header['image'] : null,
			'pageSlug' => 'resources',
		]);
	}
}
