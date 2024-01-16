<?php
namespace App\Action\Page;

use App\Repository\PostsRepository;

class BlogAction extends CoreAction
{
	private PostsRepository $Posts;

	public function invoke() : void
	{
		$this->Posts = new PostsRepository();

		$this->getView()->render($this->getResponse(), 'pages/blog.php', [
			'pageTitle' => 'Sparkle: The Official Spark Blog',
			'pageDescription' => 'Essays, articles, video and more from the Spark team.',
			'pageSlug' => 'blog',
			'posts' => $this->Posts->getPosts(),
		]);
	}
}
