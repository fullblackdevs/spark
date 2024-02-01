<?php
namespace App\Module\Content\Action;

use App\Action\CoreAction;
use Psr\Http\Message\ResponseInterface;

class ViewContributorAction extends CoreAction
{
	public function invoke() : ResponseInterface
	{
		return $this->getView()->render($this->getResponse(), '/Context/Contributor/view.php', [
			'pageTitle' => 'Contributor',
			'pageSlug' => 'contributor',
		]);
	}
}
