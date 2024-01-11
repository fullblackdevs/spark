<?php
namespace App\Action;

use App\Action\Page\CoreAction;
use App\Repository\EventsRepository;
use Cake\Chronos\ChronosDate;
use Cake\Collection\Collection;

class GetEventPageAction extends CoreAction
{
	private EventsRepository $Events;

	public function invoke() : void
	{
		$this->Events = new EventsRepository();
		$this->getView()->addAttribute('states', $this->Events->getStates());

		$today = ChronosDate::today();
		$events = [];
		$events['all'] = new Collection($this->Events->getEvents());

		$slug = $this->getRequest()->getAttribute('slug');
		ray($slug);
		$event = $events['all']->firstMatch(['slug' => $slug]);

		$this->getView()->render($this->getResponse(), 'pages/event.php', [
			'event' => $event,
			'pageSlug' => 'events',
			'isSinglePage' => true,
		]);
	}
}
