<?php
namespace App\Module\Content\Entity;

class Partner extends ContentEntity
{
	private string $_id;

	private array $_data;

	private string $_urlPrefix = '/partner/';

	public function __construct(array $data)
	{
		$this->_id = $data['id'];
		$this->_data = $data;
	}

	public function getAddress(): ?array
	{
		if (isset($this->_data['address'])) {
			return $this->_data['address'];
		}

		return null;
	}

	public function getName(): ?string
	{
		if (isset($this->_data['name'])) {
			return $this->_data['name'];
		}

		return null;
	}

	public function getWebsite(): ?string
	{
		if (isset($this->_data['website'])) {
			return $this->_data['website'];
		}

		return null;
	}
}
