<?php

namespace App\Repository;

use Cake\Collection\Collection;
use League\Flysystem\Filesystem;
use Orhanerday\OpenAi\OpenAi;
use Faker\Factory as Faker;

class PostsRepository extends CoreRepository implements RepositoryInterface
{
	private array $Posts;

	public function __construct(?Filesystem $fs = null)
	{
		parent::__construct();

		$postsData = $this->loadData('posts');

		if (isset($postsData['items'])) {
			$this->Posts = $postsData['items'];
		} else {
			$this->Posts = $postsData;
		}
	}

	public function getPosts()
	{
		if (isset($this->Posts)) {
			return $this->Posts;
		} else {
			/** @todo: implement external Posts data load in constructor to its own method
			 * this can be called load() and moved up to the RepositoryInterface and then into
			 * an AbstractRepository class since the implementation is the same for all Repositories
			 */
		}

		return $this->Posts;
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
