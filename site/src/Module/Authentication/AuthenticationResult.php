<?php
namespace App\Module\Authentication;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class AuthenticationResult
{
	private ServerRequestInterface $_request;

	public function __construct(ServerRequestInterface $request)
	{
		$this->_request = $request;
	}

	public function isValid(): bool
	{
		return true;
	}

	public function getResponse(): ResponseInterface
	{
		return $response;
	}

	public function getAuthenticatedResponse(): ResponseInterface
	{
		return $response;
	}
}
