<?php
namespace App\Module\Content\Entity;

use App\Module\Content\Traits\GeographyDataTrait;
use Cake\Chronos\Chronos;
use Cake\Chronos\ChronosDate;
use Cake\Core\Configure;

class Resource extends ContentEntity
{
	use GeographyDataTrait;

	private string $_id;

	private array $_data;

	private string $_urlPrefix = '/resource/';

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

		return null;
	}

	public function getTitle(): string
	{
		return $this->getName();
	}

	public function getDate(string $format = 'l, F j, Y'): ?string
	{
		if (isset($this->_data['date'])) {
			$date = ChronosDate::createFromFormat(Chronos::ATOM, $this->_data['date'])->format($format);
			return $date;
		}

		return null;
	}

	public function getContentBadges(): array
	{
		return ['Resource'];
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

	public function getLocation(): ?array
	{
		$partner = $this->getPartner();

		if ($address = $partner->getAddress()) {
			if (isset($address['city']) && isset($address['state'])) {
				$city = $address['city'];
				$state = Configure::read('DataRegistry.US.States.' . $address['state'] . '.abbr', $address['state']);

				return [
					'city' => $city,
					'state' => $state
				];
			}
		}

		return null;
	}

	public function getPartner(): ?Partner
	{
		if (isset($this->_data['partner'])) {
			return new Partner($this->_data['partner']);
		}

		return null;
	}

	public function getImageUrl(): ?string
	{
		if (isset($this->_data['image'])) {
			$prefix = $this->getImageAssetPath();
			return $prefix . $this->_data['image'];
		}

		return null;
	}

	public function getFullDescription(): ?string
	{
		if (isset($this->_data['description']['full'])) {
			return $this->_data['description']['full'];
		}

		return null;
	}

	public function getSchedule(): ?string
	{
		if (isset($this->_data['schedule'])) {
			return $this->_data['schedule'];
		}

		return null;
	}
}
