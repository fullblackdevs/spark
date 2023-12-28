<?php
namespace App\Action\Page;

class AboutAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getView()->render($this->getResponse(), 'pages/about.php', [
			'pageTitle' => 'About Us',
			'pageDescription' => 'Spark is here to empower, educate and engage women from every walk of life...everywhere',
			'pageSlug' => 'about',
		]);
	}
}
