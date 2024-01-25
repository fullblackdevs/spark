<?php
namespace App\Module\Authentication\Authenticator;

use Psr\Http\Message\ServerRequestInterface;

interface AuthenticatorInterface
{
	public function authenticate(ServerRequestInterface $request): Result;
}
