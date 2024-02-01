<?php
namespace App\Action;

use App\Action\Page\CoreAction;
use App\Repository\ResourcesRepository;

class GetResourcePageAction extends CoreAction
{
	private ResourcesRepository $Resources;

	public function invoke() : void
	{
		$this->Resources = new ResourcesRepository();

		$resource = $this->Resources->getResource($this->getRequest()->getAttribute('slug'));

		$this->getView()->render($this->getResponse(), 'pages/resource.php', [
			'pageTitle' => 'Resources',
			'pageDescription' => 'Our curated and searchable directory of services tailored to you.',
			'pageSlug' => 'resources',
			'isSinglePage' => true,
			'resource' => $resource,
		]);
	}
}
