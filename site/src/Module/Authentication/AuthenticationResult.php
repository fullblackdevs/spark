<?php
namespace App\Module\Authentication;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Factory\Psr17\GuzzlePsr17Factory;

final class AuthenticationResult
{
	protected string $_status;

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
		return GuzzlePsr17Factory::getResponseFactory()->createResponse(200);
	}

	public function getAuthenticatedResponse(): ResponseInterface
	{
		return GuzzlePsr17Factory::getResponseFactory()->createResponse(200);
	}
}
