<?php
namespace App\Action\API;

class GetResourcesAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getResponse()->getBody()->write(json_encode(["action" => "Get Resources", "status" => "success"]));
	}
}
