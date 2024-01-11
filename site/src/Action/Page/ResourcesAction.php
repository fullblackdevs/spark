<?php
namespace App\Action\Page;

use App\Repository\EventsRepository;
use App\Repository\ResourcesRepository;

class ResourcesAction extends CoreAction
{
	private $Resources;

	public function invoke() : void
	{
		$this->Resources = new ResourcesRepository();

		$this->getView()->render($this->getResponse(), 'pages/resources.php', [
			'pageTitle' => 'Resources',
			'pageDescription' => 'Our curated and searchable directory of services tailored to you.',
			'pageSlug' => 'resources',
		]);
	}
}
