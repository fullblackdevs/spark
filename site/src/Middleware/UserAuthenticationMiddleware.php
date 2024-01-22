<?php
namespace App\Middleware;

use App\Module\Authentication\AuthenticationService;
use App\Module\Authentication\AuthenticationResult;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

final class UserAuthenticationMiddleware implements MiddlewareInterface
{
	private AuthenticationResult $_result;

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
	{
		/** @todo AuthenticationService should be injected from the Dependency Container...this is a temporary solution */
		$authService = $this->getAuthenticationService();

		// Process Logout Actions Here
		// How do we configure which routes are logout routes?
		// something about the setup of the AuthenticationService should know which routes indicate logout
		if ($request->getUri()->getPath() == $request->getAttribute('__routeParser__')->urlFor('user.logout')) {
			return $authService->logout($request, $handler->handle($request));
		} elseif ($request->getUri()->getPath() == $request->getAttribute('__routeParser__')->urlFor('user.login')) {
			$response = $handler->handle($request);
		}

		// the Result object here should contain the correct Response for the Authentication process
		$this->_result = $authService->authenticate($request, $handler);

		// build the Response based on the Result object

		if ($this->_result->isValid()) {
			// create authenticated response to pass to next Middleware
			$response = $this->_result->getAuthenticatedResponse();
			$response = $handler->handle($request);

			if ($request->getMethod() === 'POST') {
				$response = $response->withStatus(302)->withHeader('Location', $request->getAttribute('__routeParser__')->urlFor('user.dashboard'));
			}
		} else {
			$response = $this->_result->getResponse();
		}

		return $response;
	}

	private function getAuthenticationService(): AuthenticationService
	{
		return new AuthenticationService();
	}
}
