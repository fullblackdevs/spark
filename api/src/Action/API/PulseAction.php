<?php
namespace App\Action\API;

use Psr\Http\Message\ResponseInterface;

class PulseAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getResponse()->getBody()->write(json_encode(["message" => "Spark This!"]));
	}
}
