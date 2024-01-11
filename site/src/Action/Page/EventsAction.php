<?php
namespace App\Action\Page;

use App\Repository\EventsRepository;
use Cake\Chronos\Chronos;
use Cake\Chronos\ChronosDate;
use Cake\Collection\Collection;
use App\Repository\ResourcesRepository;

class EventsAction extends CoreAction
{
	private EventsRepository $Events;

	public function invoke() : void
	{
		$this->Events = new EventsRepository();
		$this->getView()->addAttribute('states', $this->Events->getStates());

		$today = ChronosDate::today();
		$events = [];
		$events['all'] = new Collection($this->Events->getEvents());

		/**
		 * ORGANIZE EVENTS
		 *
		 * For the time being, Events are mutually exclusive between 1 of 4 categories:
		 * 1. Featured Events
		 * 2. Today's Events
		 * 3. Upcoming Events
		 * 4. Past Events
		 *
		 */

		// FEATURED EVENTS
		/** @todo implement support to be sure the Featured Events list does not include events happening Today **/
		$events['featured'] = $events['all']->filter(function ($event) {
			return (key_exists('isPinned', $event) && $event['isPinned'] === true) || false;
		})->toArray();

		// TODAY'S EVENTS
		/** @todo add support to differentiate when we are in Demo Mode and it is okay to artificially assign some events to today **/
		/** @todo expand support to calculate if Recurring and Multi-Day Events are happening Today */
		$events['today'] = $events['all']->filter(function ($event) {
			return (isset($event['schedule']['dates']['start']) && (Chronos::createFromFormat(Chronos::ATOM, $event['schedule']['dates']['start']))->isToday()) || false;
		})->toArray();

		if (empty($events['today'])) {
			$events['today'] = $events['all']->sample($this->fake->numberBetween(1,3))->reject(function ($event) use ($events) {
				/** @todo implement collection() helper function by loading CakePHP global_functions.php file **/
				$featured = (new Collection($events['featured']))->extract('id')->toList();
				return in_array($event['id'], $featured) || false;
			})->toArray();
		}

		/** reset dates to match the current day in Demo Mode */
		foreach ($events['today'] as $key => $event) {
			$start = Chronos::createFromFormat(Chronos::ATOM, $event['schedule']['dates']['start']);
			$end = Chronos::createFromFormat(Chronos::ATOM, $event['schedule']['dates']['end']);

			$events['today'][$key]['schedule']['dates']['start'] = $start->setDate($today->year, $today->month, $today->day)->format(Chronos::ATOM);
			$events['today'][$key]['schedule']['dates']['end'] = $end->setDate($today->year, $today->month, $today->day)->format(Chronos::ATOM);
		}

		// UPCOMING & PAST EVENTS
		$events['items'] = $events['all']->map(function ($event) use ($events) {
			/**
			 * We would ideally included an additional logic check to ensure that the event is not happening today (isToday()) but
			 * we can't do that because we are not yet supporting Recurring Events or Multi-Day Events.
			 *
			 * For the time being we will check to make sure selected Events are not already included in the Featured Events or Today's Events lists.
			 */

			if (isset($event['schedule']['dates']['start']) && (Chronos::createFromFormat(Chronos::ATOM, $event['schedule']['dates']['start']))->isFuture()) {
				$event['type'] = 'upcoming';
			} elseif (isset($event['schedule']['dates']['start']) && (Chronos::createFromFormat(Chronos::ATOM, $event['schedule']['dates']['start']))->isPast()) {
				$event['type'] = 'past';
			}

			return $event;
		})->reject(function ($event) use ($events) {
			$featured = (new Collection($events['featured']))->extract('id')->toList();
			$today = (new Collection($events['today']))->extract('id')->toList();

			return (in_array($event['id'], $featured) || in_array($event['id'], $today)) || false;
		})->toArray();

		$this->getView()->render($this->getResponse(), 'pages/events.php', [
			'pageTitle' => 'Events',
			'pageDescription' => 'Events that empower, engage and entertain.',
			'pageSlug' => 'events',
			'events' => $events,
			'pinnedEvents' => array_merge($events['featured'], $events['today']),
		]);
	}
}
