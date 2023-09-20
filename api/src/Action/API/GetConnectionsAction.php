<?php
namespace App\Action\API;

class GetConnectionsAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getResponse()->getBody()->write(json_encode(["action" => "Get Connections", "status" => "success"]));
	}
}
