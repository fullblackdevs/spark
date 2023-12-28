<?php
namespace App\Action\Page;

class EventsAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getView()->render($this->getResponse(), 'pages/events.php', [
			'pageTitle' => 'Events',
			'pageDescription' => 'Events that empower, engage and entertain.',
			'pageSlug' => 'events',
		]);
	}
}
