<?php
namespace App\Module\Content\Entity;

use App\Module\Content\Traits\GeographyDataTrait;
use Cake\Chronos\Chronos;
use Cake\Chronos\ChronosDate;

class Post extends ContentEntity
{
	use GeographyDataTrait;

	private string $_id;

	private array $_data;

	private string $_urlPrefix = '/blog/';

	public function __construct(array $data)
	{
		$this->_data = $data;
		$this->_id = $data['id'];
	}

	public function getName(): ?string
	{
		if (isset($this->_data['name'])) {
			return $this->_data['name'];
		}

		if (isset($this->_data['title'])) {
			return $this->_data['title'];
		}

		return null;
	}

	public function getTitle(): string
	{
		return $this->getName();
	}

	public function getSlug(): ?string
	{
		return $this->_data['slug'];
	}

	public function getContributor(): Contributor
	{
		if (isset($this->_data['contributor'])) {
			return new Contributor($this->_data['contributor']);
		}

		return null;
	}

	public function getDate(string $format = 'l, F j, Y'): string
	{
		if (isset($this->_data['date'])) {
			$date = ChronosDate::createFromFormat(Chronos::ATOM, $this->_data['date'])->format($format);
			return $date;
		}
	}

	public function getContentBadges(): array
	{
		if (isset($this->_data['type'])) {
			return [ucwords($this->_data['type'])];
		}

		return [];
	}

	public function getUrl(): ?string
	{
		if ($slug = $this->_data['slug']) {
			$prefix = $this->getUrlPrefix();
			return $prefix . $slug;
		}

		return null;
	}

	private function getUrlPrefix(): string
	{
		return $this->_urlPrefix;
	}

	public function getImageUrl(): ?string
	{
		if (isset($this->_data['image'])) {
			$path = $this->getImageAssetPath();
			return $path . $this->_data['image'];
		}

		return null;
	}
}
