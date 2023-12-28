<?php
namespace App\Action\Page;

class ConnectAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getView()->render($this->getResponse(), 'pages/connect.php', [
			'pageTitle' => 'Connect',
			'pageDescription' => 'Light your own Spark by connecting with us across the web.',
			'pageSlug' => 'connect',
		]);
	}
}
