<?php
namespace App\Module\Content\Entity;

class Page
{
	private array $data;

	public function __construct(array $page)
	{
		$this->data = $page;
	}

	public function getSection(string $name) : ?array
	{
		if (isset($this->data['sections'][$name])) {
			return $this->data['sections'][$name];
		}

		return null;
	}
}
