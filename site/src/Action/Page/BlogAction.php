<?php
namespace App\Action\Page;

class BlogAction extends CoreAction
{
	public function invoke() : void
	{
		$this->getView()->render($this->getResponse(), 'pages/blog.php', [
			'pageTitle' => 'Sparkle: The Official Spark Blog',
			'pageDescription' => 'Essays, articles, video and more from the Spark team.',
			'pageSlug' => 'blog',
		]);
	}
}
