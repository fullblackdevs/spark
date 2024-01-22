<?php
namespace App\Module\User\Action;

use Psr\Http\Message\ResponseInterface;

class LoginAction extends CoreAction
{
	protected string $_context = 'User/auth.php';

	public function invoke(): ResponseInterface
	{
		return $this->getView()->render($this->getResponse(), 'View/User/login.php', []);
	}
}
