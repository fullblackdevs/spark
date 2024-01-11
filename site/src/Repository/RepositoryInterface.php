<?php
namespace App\Repository;

use League\Flysystem\Filesystem;

interface RepositoryInterface {
	public function __construct(?Filesystem $do = null);
}
