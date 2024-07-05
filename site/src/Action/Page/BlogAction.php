<?php
namespace App\Action\Page;

use App\Module\Content\Repository\ContributorsRepository;
use App\Repository\PostsRepository;

class BlogAction extends CoreAction
{
	private PostsRepository $Posts;

	public function invoke() : void
	{
		ray($this->SanityClient);
		$this->Posts = new PostsRepository();

		$postsSanity = $this->SanityClient->fetch('*[_type == "post"]{...,author->{...,"imageUrl": portrait.asset->url},headerImage->{...}}');

		$page = $this->Pages->getPage('blog');
		$header = $page->getSection('header');

		$this->getView()->render($this->getResponse(), 'pages/blog.php', [
			'pageTitle' => isset($header['title']) ? $header['title'] : 'Title Not Set',
			'pageDescription' => isset($header['description']) ? $header['description'] : 'Description Not Set',
			'pageHeaderImage' => isset($header['image']) ? $header['image'] : null,
			'pageSlug' => 'blog',
			'posts' => $this->Posts->getPosts(),
			'posts2' => $postsSanity,
		]);
	}
}
