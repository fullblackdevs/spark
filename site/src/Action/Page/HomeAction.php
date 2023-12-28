<?php
namespace App\Action\Page;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getView()->render($this->getResponse(), 'pages/home.php', [
			'pageTitle' => 'Home',
			'isHome' => true,
			'pageSlug' => 'home',
		]);
	}
}
