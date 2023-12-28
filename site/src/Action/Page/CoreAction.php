<?php
namespace App\Action\Page;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;

abstract class CoreAction
{
	private ServerRequestInterface $request;
    private ResponseInterface $response;
	private PhpRenderer $renderer;

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

	protected function getView() : PhpRenderer
	{
		if (!isset($this->renderer)) {
			$this->renderer = new PhpRenderer(TEMPLATES);
		}

		$this->renderer->setLayout('layouts/page.php');

		return $this->renderer;
	}

	abstract public function invoke() : void;
}
