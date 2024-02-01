<?php
namespace App\Module\Content\Entity;

class Contributor extends ContentEntity
{
	private string $_id;

	private array $_data;

	private string $_urlPrefix = '/conributor/';

	public function __construct(array $data)
	{
		$this->_id = $data['id'];
		$this->_data = $data;
	}

	public function getName(): string
	{
		if (isset($this->_data['name'])) {
			return $this->_data['name'];
		}

		return null;
	}

	public function getProfileImage(): string
	{
		if (isset($this->_data['image'])) {
			return $this->_data['image'];
		}

		return null;
	}

	public function getSlug(): string
	{
		return $this->_data['slug'];
	}

	public function getUrl(): ?string
	{
		if (isset($this->_data['slug'])) {
			$prefix = $this->getUrlPrefix();
			return $prefix . $this->_data['slug'];
		}

		return null;
	}

	private function getUrlPrefix(): string
	{
		return $this->_urlPrefix;
	}
}
