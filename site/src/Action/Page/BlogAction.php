<?php
namespace App\Action\Page;

use App\Module\Content\Repository\ContributorsRepository;
use App\Repository\PostsRepository;

class BlogAction extends CoreAction
{
	private PostsRepository $Posts;

	public function invoke() : void
	{
		$this->Posts = new PostsRepository();

		$page = $this->Pages->getPage('blog');
		$header = $page->getSection('header');

		$this->getView()->render($this->getResponse(), 'pages/blog.php', [
			'pageTitle' => isset($header['title']) ? $header['title'] : 'Title Not Set',
			'pageDescription' => isset($header['description']) ? $header['description'] : 'Description Not Set',
			'pageHeaderImage' => isset($header['image']) ? $header['image'] : null,
			'pageSlug' => 'blog',
			'posts' => $this->Posts->getPosts(),
		]);
	}
}
