<?php
namespace App\Action\Page;

class AboutAction extends CoreAction
{
	public function invoke() : void
	{
		$page = $this->Pages->getPage('about');
		$header = $page->getSection('header');
		$content = $page->getSection('content');

		$this->getView()->render($this->getResponse(), 'pages/about.php', [
			'pageTitle' => isset($header['title']) ? $header['title'] : 'Title Not Set',
			'pageDescription' => isset($header['description']) ? $header['description'] : 'Description Not Set',
			'pageHeaderImage' => isset($header['image']) ? $header['image'] : null,
			'pageSlug' => 'about',
			"content" => $content,
		]);
	}
}
