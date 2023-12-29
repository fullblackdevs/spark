<?php
namespace App\Action;

use App\Action\Page\CoreAction;

class GetEventPageAction extends CoreAction
{
	private array $_events = [
		'we-the-people' => [
			'title' => 'We the People National March',
			'date' => 'Sunday, July 2, 2023',
			'sponsor' => 'AIDS Healthcare Foundation',
		],
	];

	public function invoke() : void
	{
		$slug = $this->getRequest()->getAttribute('slug');
		$event = $this->_events[$slug];

		$this->getView()->render($this->getResponse(), 'pages/event.php', [
			'pageData' => $event,
			'pageSlug' => 'events',
			'isSingle' => true,
		]);
	}
}
