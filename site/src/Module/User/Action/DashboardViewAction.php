<?php
namespace App\Module\User\Action;

use Psr\Http\Message\ResponseInterface;

final class DashboardViewAction extends CoreAction
{
	public function invoke(): ResponseInterface
	{
		$this->initialize();
		return $this->getView()->render($this->getResponse(), 'View/User/dashboard.php', []);
	}
}
