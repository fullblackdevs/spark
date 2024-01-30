<?php
namespace App\Repository;

use App\Service\DigitalOceanSpacesService;
use App\Service\Storage\LocalStorageService;
use Cake\Collection\Collection;
use Cake\Core\Configure;
use Cake\Utility\Hash;
use Cake\Utility\Inflector;
use Exception;
use League\Flysystem\Filesystem;
use League\Flysystem\FilesystemException;
use League\Flysystem\UnableToCheckExistence;
use ReflectionMethod;

abstract class CoreRepository
{
	protected Filesystem $fs;

	protected array $config = [
		'content' => [
			'source' => [ // holds the Content Source for the current Request
				'environment' => null,
				'connection' => null,
				'format' => null,
			],
			'sources' => [], // holds all Content Sources configured in app.php
			'connections' => [  // @todo: implement Content Sources as an Enum
				'local' => [
					'class' => LocalStorageService::class,  // @todo: implement Content Sources as a Service
					'path' => WEB_ROOT . 'content' . DS,
				],
				'digitalocean' => [
					'class' => DigitalOceanSpacesService::class,
					'path' => 'content',
				],
				'aws' => [],
			]
		],
	];

	public function __construct(?Filesystem $fs = null)
	{
		// 1. load Content Repository environments
		$this->config['content']['environments'] = Configure::read('Content.Repository.environments');

		// 2. load the Content Repository configuration
		$contentEnv = $this->config['content']['source']['environment'] = Configure::read('Content.Repository.environment');
		$contentSource = Configure::read("Content.Repository.environments.{$contentEnv}");

		if ($contentSource) {
			// merge empty array with loaded Repository configuration to create a single array
			$this->config['content']['source'] = array_merge($this->config['content']['source'], $contentSource);

			// replace Content Connection type with the Connection Details array
			$this->config['content']['source']['connection'] = $this->config['content']['connections'][$contentSource['connection']];
		} else {
			throw new Exception('Content Repository configuration not found.');
		}

		// 3. create the Filesystem object to use for this Repository
		if ($fs) {
			$this->fs = $fs;  // if we've provided a Filesystem object to the constructor, use it
		} else {
			$contentSource = $this->config['content']['source'];

			$init = new ReflectionMethod($contentSource['connection']['class'], 'init');

			if ($init->isStatic()) {
				$connectionClass = $contentSource['connection']['class'];
				$connectionPath = $contentSource['connection']['path'];
				$this->fs = $connectionClass::init($connectionPath);
			} else {
				throw new Exception('Content Repository initialization class must be static.');
			}
		}
	}

	/**
	 * Undocumented function
	 *
	 * @todo implement $collection as Enum for permitted values
	 * currently should only accept value of 'dir' for content collected in a directory as
	 * individual JSON files or 'file' for content collected in a single JSON file
	 *
	 * @param string|null|null $type
	 * @param string $collection
	 * @return null|array
	 */
	public function loadContent(?string $type = null, string $collection = 'dir'): ?array
	{
		$content = [];

		if ($type) {
			// Default collection should be by Directory and individual JSON files
			if ($collection === 'file') {
				if ($this->fs->fileExists($type . '.json')) {
					$content = json_decode($this->fs->read($type . '.json'), true);
				} else {
					throw new Exception('Could not locate a data file for ' . ucwords($type) . ' content.');
				}
			} else {
				try {
					if ($this->fs->directoryExists($type)) {
						foreach ($this->fs->listContents("/{$type}") as $item) {
							if ($this->fs->mimeType($item->path()) === 'application/json') {
								$content[] = json_decode($this->fs->read($item->path()), true);
							}
						}
					} else {
						throw new Exception('Could not locate a directory of ' . ucwords($type) . ' content.');
					}
				} catch (FilesystemException | UnableToCheckExistence $exception) {
					// handle the error
				}
			}
		} else {
			throw new Exception('No data type specified.');
		}

		return $content;
	}

	/**
	 * Undocumented function
	 *
	 * We can pass a single assocation or an array of associations to load
	 * into the primary Content array
	 *
	 * @param array $content
	 * @param string|array $association
	 * @param string $collectionType
	 * @return array
	 */
	protected function loadAssociatedContent(array $content, string|array $association, string $collectionType = 'dir'): array
	{
		if (is_array($association)) {
			foreach ($association as $assoc) {
				$content = $this->_loadAssociatedContent($content, $assoc, $collectionType);
			}
		} else {
			$content = $this->_loadAssociatedContent($content, $association, $collectionType);
		}

		return $content;
	}

	/**
	 * Undocumented function
	 *
	 * @todo add support for a dot-seperated path to a specific data value in the content
	 * @param array $content
	 * @param string $association
	 * @param string $collectionType
	 * @return array
	 */
	private function _loadAssociatedContent(array $content, string $association, string $collectionType = 'dir'): array
	{
		$associatedContent = new Collection($this->loadContent(Inflector::pluralize($association), $collectionType));

		foreach ($content as $index => $item) {
			if ($node = Hash::get($item, Inflector::singularize($association))) {

				// if we locate the Association key, we'll use it to load the associated data
				// we need to know if the Association data is a string or an array
				// If ti's a string, we will assume it's the ID of the associated data
				// If it's an array, we will check if it has a key called 'id' and use that
				// once we load the Associated data, we can compare it with the array data to
				// see if it's changed and if so, replace the string or array with the new data

				$id = is_array($node) ? Hash::get($node, 'id') : $node;
				$associatedContentNode = !empty($id) ? $associatedContent->firstMatch(['id' => $id]) : null;

				if ($associatedContentNode) {
					if (is_array($node) && Hash::contains($node, $associatedContentNode)) {
						ray('The Content Node already contains the Associated Content Node.');
					} else {
						$content[$index][Inflector::singularize($association)] = $associatedContentNode;
					}
				}
			} else {
				ray('The Content Item does not contain the Association key.');
			}
		}

		return $content;
	}

	public function getFileSystem() : Filesystem
	{
		return $this->fs;
	}
}
