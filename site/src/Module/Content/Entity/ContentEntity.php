<?php
namespace App\Module\Content\Entity;

abstract class ContentEntity
{
	private string $_imageAssetPath = '/assets/images/';

	public function __call($name, $arguments)
	{
		return null;
	}

	public function getImageAssetPath(): ?string
	{
		return $this->_imageAssetPath;
	}
}
