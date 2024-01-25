<?php
namespace App\Action\Page;

use Cake\Chronos\ChronosDate;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\PhpRenderer;
use Faker\Factory as Faker;
use Faker\Generator as FakerGenerator;
use Odan\Session\Flash;
use Slim\Interfaces\RouteParserInterface;
use Slim\Routing\RouteContext;
use Odan\Session\PhpSession as Session;

abstract class CoreAction
{
	private ServerRequestInterface $request;
    private ResponseInterface $response;
	private PhpRenderer $renderer;

	private RouteParserInterface $Router;

	private Flash $_flash;

	protected FakerGenerator $fake;

	public function __invoke(ServerRequestInterface $request, ResponseInterface $response) : ResponseInterface
	{
		$this->request = $request;
		$this->response = $response;

		if ($request->getAttribute('session')) {
			$this->_flash = $request->getAttribute('session')->getFlash();
		}

		$this->Router = RouteContext::fromRequest($request)->getRouteParser();

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

		/** @var Session $session */
		$session = $this->request->getAttribute('session');

		$this->renderer->setLayout('layouts/page.php');

		$this->renderer->addAttribute('now', ChronosDate::now());
		$this->renderer->addAttribute('version', time());
		$this->renderer->addAttribute('Router', $this->getRouter());
		$this->renderer->addAttribute('Flash', $this->_flash);
		$this->renderer->addAttribute('Auth', $session->get('Auth'));

		return $this->renderer;
	}

	protected function getRouter() : RouteParserInterface
	{
		return $this->Router;
	}

	abstract public function invoke() : void;
}
