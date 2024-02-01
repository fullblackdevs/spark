<?php

namespace App\Repository;

use App\Module\Content\Entity\Post;
use Cake\Collection\Collection;
use League\Flysystem\Filesystem;

class PostsRepository extends CoreRepository implements RepositoryInterface
{
	private array $Posts;

	public function __construct(?Filesystem $fs = null)
	{
		parent::__construct();
	}

	public function getPosts()
	{
		if (empty($this->Posts)) {
			$this->Posts = $this->loadContent('posts');
			$this->Posts = $this->loadAssociatedContent($this->Posts, 'contributor');
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
	public function getPost(string $id = null): Post|null
	{
		if ($id) {
			$posts = new Collection($this->getPosts());
			$post = $posts->firstMatch(['slug' => $id]);

			if ($post) {
				return new Post($post);
			}
		}

		return null;
	}
}
