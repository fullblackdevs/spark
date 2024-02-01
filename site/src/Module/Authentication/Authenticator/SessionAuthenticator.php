<?php
namespace App\Module\Authentication\Authenticator;

use Psr\Http\Message\ServerRequestInterface;
use Odan\Session\PhpSession as Session;

class SessionAuthenticator implements AuthenticatorInterface
{
	protected Session $_session;

	public function authenticate(ServerRequestInterface $request): Result
	{
		$this->_session = $request->getAttribute('session', new Session());

		if ($this->_session->has('Authentication')) {
			return new Result([
				'identity' => 'test',
				'request' => $request,
			], ResultStatus::SUCCESS);
		}

		return new Result([], ResultStatus::FAILURE);
	}
}
