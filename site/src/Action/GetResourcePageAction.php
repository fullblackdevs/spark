<?php
namespace App\Action;

use App\Action\Page\CoreAction;

class GetResourcePageAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getView()->render($this->getResponse(), 'pages/resource.php', [
			'pageTitle' => 'Resources',
			'pageDescription' => 'Our curated and searchable directory of services tailored to you.',
			'pageSlug' => 'resources',
		]);
	}
}
