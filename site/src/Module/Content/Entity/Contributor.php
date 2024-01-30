<?php
namespace App\Module\Content\Entity;

class Contributor
{
	private array $data;

	public function __construct(array $data)
	{
		$this->data = $data;
	}
}
