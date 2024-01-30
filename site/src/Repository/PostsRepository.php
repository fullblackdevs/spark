<?php

namespace App\Repository;

use Cake\Collection\Collection;
use League\Flysystem\Filesystem;

class PostsRepository extends CoreRepository implements RepositoryInterface
{
	private array $Posts;

	public function __construct(?Filesystem $fs = null)
	{
		parent::__construct();

		$this->Posts = $this->loadContent('posts');
	}

	public function getPosts()
	{
		if (empty($this->Posts)) {
			$this->Posts = $this->loadContent('posts');
		}

		return new Collection($this->Posts);
	}

	/**
	 * Get a single Post by its slug
	 *
	 * @todo Method should return a Post object
	 * @param string|null $id
	 * @return array|null
	 */
	public function getPost(string $id = null): array|null
	{
		if ($id) {
			$posts = new Collection($this->getPosts());
			$post = $posts->firstMatch(['slug' => $id]);
		}

		return $post ?? null;
	}
}
