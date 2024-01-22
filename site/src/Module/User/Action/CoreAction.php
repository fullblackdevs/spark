<?php
namespace App\Module\User\Action;

use App\Action\CoreAction as AppCoreAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

abstract class CoreAction extends AppCoreAction {
	public function initialize()
	{
		if (property_exists($this, '_context') && !empty($this->_context)) {
			$this->getView()->setLayout('Context/' . $this->_context);
		} else {
			$this->getView()->setLayout('Context/user.php');
		}
	}
}
