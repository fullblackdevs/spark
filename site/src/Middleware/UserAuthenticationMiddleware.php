<?php
namespace App\Middleware;

use App\Module\Authentication\AuthenticationService;
use App\Module\Authentication\Authenticator\Result;
use Cake\Chronos\ChronosDate;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\Psr17\GuzzlePsr17Factory;
use Slim\Routing\RouteContext;
use Slim\Views\PhpRenderer;

final class UserAuthenticationMiddleware implements MiddlewareInterface
{
	private Result $_result;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
		/** @todo AuthenticationService should be injected from the Dependency Container...this is a temporary solution */
		$authService = $this->getAuthenticationService();

		// the Result object here should contain the correct Response for the Authentication process
		$this->_result = $authService->authenticate($request, $handler);

		if ($this->_result->isValid()) {
			// set Authentication attributes on the Request
			$response = $handler->handle($request->withAttribute('__authenticated__', true));

			// if the request is a Login request, redirect to the Dashboard otherwise return to the Referer
			if ($request->getUri()->getPath() === RouteContext::fromRequest($request)->getRouteParser()->urlFor('user.login')) {
				$response = $response->withStatus(302)->withHeader('Location', $request->getAttribute('__routeParser__')->urlFor('user.dashboard'));
			}
		} elseif ($this->_result->isLoginRequest()) {
			$response = $handler->handle($request);
		} elseif ($this->_result->isLogoutRequest()) {
			$response = $authService->logout($request, $handler->handle($request));
		} else {
			$View = new PhpRenderer(TEMPLATES);
			$View->setLayout('Context/User/auth.php');
			$View->setAttributes([
				'now' => ChronosDate::now(),
				'version' => time(),
				'Router' => $request->getAttribute('__routeParser__'),
				'httpStatus' => 401
			]);

			$response = $View->render(
				GuzzlePsr17Factory::getResponseFactory()->createResponse(401),
				'View/User/login.php'
			);
		}

		return $response;
	}

	private function getAuthenticationService(): AuthenticationService
	{
		return new AuthenticationService();
	}
}
