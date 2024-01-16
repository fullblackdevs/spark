<?php
namespace App\Repository;

use App\Service\DigitalOceanSpacesService;
use App\Service\Storage\LocalStorageService;
use Cake\Core\Configure;
use Exception;
use League\Flysystem\Filesystem;

abstract class CoreRepository
{
	private Filesystem $fs;

	public function __construct(?Filesystem $fs = null)
	{
		// @todo implement a way to determine if we are locally developing and should get this
		// data from the local filesystem or retrieve it online
		$config = Configure::read('Datasources.default');

		if ($fs) {
			$this->fs = $fs;
		} elseif (Configure::read('Datasource.default.connection') === 'do') {
			$this->fs = DigitalOceanSpacesService::init("data");
		} else {
			$this->fs = LocalStorageService::init(WEB_ROOT_DATA);
		}

		ray($this->fs);
	}

	public function loadData(string|null $type = null): null|array
	{
		if ($type) {
			if (!$this->fs->has($type . '.json')) {
				throw new Exception(ucwords($type) . ' data type does not exist.');
			}

			$data = $this->fs->read($type . '.json');
			$data = json_decode($data, true);
		} else {
			throw new Exception('No data type specified');
		}

		return $data ?? null;
	}

	public function getFileSystem() : Filesystem
	{
		return $this->fs;
	}
}
