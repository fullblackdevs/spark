<?php
namespace App\Action\Page;

use Cake\Chronos\ChronosDate;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use Faker\Factory as Faker;
use Faker\Generator as FakerGenerator;
use Slim\Interfaces\RouteParserInterface;

abstract class CoreAction
{
	private ServerRequestInterface $request;
    private ResponseInterface $response;
	private PhpRenderer $renderer;

	private RouteParserInterface $Router;

	protected FakerGenerator $fake;

	public function __invoke(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface
	{
		$this->request = $request;
		$this->response = $response;

		$this->Router = $request->getAttribute('__routeParser__');

		$this->fake = Faker::create();

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

		$this->renderer->addAttribute('now', ChronosDate::now());
		$this->renderer->addAttribute('version', time());
		$this->renderer->addAttribute('Router', $this->getRouter());

		return $this->renderer;
	}

	protected function getRouter() : RouteParserInterface
	{
		return $this->Router;
	}

	abstract public function invoke() : void;
}
