<?php

namespace App\Module\Authentication\Authenticator;

use App\Service\Storage\DigitalOceanSpacesService;
use Cake\Utility\Security;
use League\Flysystem\StorageAttributes;
use Psr\Http\Message\ServerRequestInterface;
use Odan\Session\PhpSession as Session;

class FormAuthenticator implements AuthenticatorInterface
{
	protected Session $_session;

	public function __construct()
	{
		Security::setSalt(env('ORGANIZATION_ID'));
	}

	public function authenticate(ServerRequestInterface $request): Result
	{
		$this->_session = $request->getAttribute('session', new Session());

		// exists this Authenticator if the request is not a POST request from the Login page
		if ($request->getUri()->getPath() !== $request->getAttribute('__routeParser__')->urlFor('user.login') || $request->getMethod() !== 'POST') {
			return new Result([], ResultStatus::FAILURE);
		}

		$credentials = $request->getParsedBody();

		$fs = DigitalOceanSpacesService::init('registry/users');

		$badge = [
			'$schema' => [
				'resource' => 'badge',
				'version' => '0.1.0',
			],
			'username' => $credentials['username'],
		];

		$badgeID = strtoupper(Security::hash(json_encode($badge), 'md5', true));

		ray($badgeID);

		if ($fs->has($badgeID . '.json')) {
			$user = json_decode(Security::decrypt($fs->read($badgeID . '.json'), env('ORGANIZATION_KEY')), true);
			ray($user);

			if (password_verify($credentials['password'], $user['credentials']['password'])) {
				// User is verified
				$this->_session->set('Authentication', $credentials);
				return new Result([
					'identity' => 'test',
					'request' => $request,
				], ResultStatus::SUCCESS);
			}
		}

		ray($this->_session->getFlash());
		$this->_session->getFlash()->add('error', 'Invalid username or password.<br />Please try again.');

		return new Result([
			'request' => $request,
		], ResultStatus::FAILURE);
	}
}
