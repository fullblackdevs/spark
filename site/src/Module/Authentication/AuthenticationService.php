<?php
namespace App\Module\Authentication;

use App\Module\Authentication\Authenticator\AuthenticatorInterface;
use App\Module\Authentication\Authenticator\FormAuthenticator;
use App\Module\Authentication\Authenticator\Result;
use App\Module\Authentication\Authenticator\ResultStatus;
use App\Module\Authentication\Authenticator\SessionAuthenticator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\Psr17\GuzzlePsr17Factory;

final class AuthenticationService
{
	private array $_authenticators;

	protected AuthenticatorInterface $_successAuthenticator;

	public function __construct()
	{
		$this->_authenticators = [
			new SessionAuthenticator(),
			new FormAuthenticator(),
		];
	}

	public function logout(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
	{
		$request->getAttribute('session')->destroy();
		return $response;
	}

	public function authenticate(ServerRequestInterface $request): Result
	{
		if ($request->getUri()->getPath() === $request->getAttribute('__routeParser__')->urlFor('user.logout')) {
			return new Result([], ResultStatus::LOGOUT_REQUEST);
		}

		foreach ($this->_authenticators as $authenticator) {
			$result = $authenticator->authenticate($request);

			if ($result->isValid()) {
				$this->_successAuthenticator = $authenticator;
				$request->getAttribute('session')->set('Auth', $this);
				break;
			}
		}

		if (!isset($this->_successAuthenticator) && ($request->getUri()->getPath() === $request->getAttribute('__routeParser__')->urlFor('user.login'))) {
			return new Result([], ResultStatus::LOGIN_REQUEST);
		}

		return $result;
	}

	public function isLoggedIn(): bool
	{
		return isset($this->_successAuthenticator);
	}
}
