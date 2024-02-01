<?php
namespace App\Module\Content\Action;

use App\Action\Page\CoreAction;
use App\Repository\PostsRepository;

class ViewPostAction extends CoreAction
{
	private PostsRepository $Posts;

	public function invoke() : void
	{
		$this->Posts = new PostsRepository();

		$Post = $this->Posts->getPost($this->getRequest()->getAttribute('slug'));

		$this->getView()->render($this->getResponse(), 'pages/post.php', [
			'pageTitle' => 'Post',
			'pageDescription' => 'Our curated and searchable directory of services tailored to you.',
			'isSinglePage' => true,
			'Post' => $Post,
		]);
	}
}
