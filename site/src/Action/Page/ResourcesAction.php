<?php
namespace App\Action\Page;

class ResourcesAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getView()->render($this->getResponse(), 'pages/resources.php', [
			'pageTitle' => 'Resources',
			'pageDescription' => 'Our curated and searchable directory of services tailored to you.',
			'pageSlug' => 'resources',
		]);
	}
}
