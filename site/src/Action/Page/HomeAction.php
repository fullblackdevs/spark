<?php
namespace App\Action\Page;

use App\Repository\EventsRepository;
use App\Repository\PostsRepository;
use App\Repository\ResourcesRepository;
use Cake\Collection\Collection;
use Cake\Core\Configure;

class HomeAction extends CoreAction
{
	protected $Posts;
	protected $Resources;
	protected $Events;

	public function invoke() : void
	{
		$pinnedContent = [];

		$Posts = new PostsRepository();
		$posts = $Posts->getPosts();
		$pinnedContent = array_merge($pinnedContent, $Posts->getPinnedContent($posts, 'post'));

		$Resources = new ResourcesRepository();
		$resources = $Resources->getResources();
		$pinnedContent = array_merge($pinnedContent, $Resources->getPinnedContent($resources, 'resource'));

		$Events = new EventsRepository();
		//$events = $Events->getEvents();
		//$pinnedContent['events'] = $Events->getPinnedContent($events);

		$this->getView()->render($this->getResponse(), 'pages/home.php', [
			'pageTitle' => 'Home',
			'isHome' => true,
			'pageSlug' => 'home',
			'pinnedContent' => new Collection($pinnedContent),
		]);
	}
}
