<?php
namespace App\Module\Authentication;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AuthenticationService
{
	public function __construct()
	{
		ray('Authentication Service is constructed');
	}

	public function logout(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
	{
		ray('Authentication Service is logging User out');
		return $response;
	}

	public function authenticate(ServerRequestInterface $request): AuthenticationResult
	{
		// cycle through Authenticators
		return new AuthenticationResult($request);
	}
}
