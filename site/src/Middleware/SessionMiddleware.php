<?php
namespace App\Middleware;

use Odan\Session\PhpSession as Session;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class SessionMiddleware implements MiddlewareInterface
{
	private Session $_session;

	public function __construct()
	{
		$this->_session = new Session();
	}

	public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
		if(!$this->_session->isStarted()) {
			$this->_session->start();
		}

		$request = $request->withAttribute('session', $this->_session);

        $response = $handler->handle($request);
        return $response;
	}
}
