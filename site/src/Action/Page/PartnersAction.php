<?php
namespace App\Action\Page;

class PartnersAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getView()->render($this->getResponse(), 'pages/partners.php', [
			'pageTitle' => 'Partners',
			'pageDescription' => 'Spark connects organizations supporting women with the resources they need to succeed.',
			'pageSlug' => 'partners',
		]);
	}
}
