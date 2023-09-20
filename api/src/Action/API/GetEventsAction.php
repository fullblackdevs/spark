<?php
namespace App\Action\API;

use Psr\Http\Message\ResponseInterface;

class GetEventsAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getResponse()->getBody()->write(json_encode(["action" => "Get Events", "status" => "success"]));
	}
}
