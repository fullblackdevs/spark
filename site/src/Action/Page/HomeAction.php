<?php
namespace App\Action\Page;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getResponse()->getBody()->write('Welcome to Spark!');
	}
}
