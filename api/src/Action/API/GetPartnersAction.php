<?php
namespace App\Action\API;

class GetPartnersAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getResponse()->getBody()->write(json_encode(["action" => "Get Partners", "status" => "success"]));
	}
}
