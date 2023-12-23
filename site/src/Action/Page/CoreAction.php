<?php
namespace App\Action\Page;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class CoreAction
{
	private ServerRequestInterface $request;
    private ResponseInterface $response;

	public function __invoke(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface
	{
		$this->request = $request;
		$this->response = $response;

		$this->invoke();

		return $this->response;
	}

	protected function getRequest() : ServerRequestInterface
	{
		return $this->request;
	}

	protected function getResponse() : ResponseInterface
	{
		return $this->response;
	}

	abstract public function invoke() : void;
}
