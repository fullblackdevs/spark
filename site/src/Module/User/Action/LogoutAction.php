<?php
namespace App\Module\User\Action;

use Psr\Http\Message\ResponseInterface;

class LogoutAction extends CoreAction
{
	public function invoke(): ResponseInterface
	{
		return $this->getView()->render($this->getResponse(), 'View/User/logout.php', []);
	}
}
