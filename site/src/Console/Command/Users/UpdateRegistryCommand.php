<?php
namespace App\Console\Command\Users;

use App\Console\Command\CoreCommand;
use App\Service\Storage\DigitalOceanSpacesService;
use Cake\Utility\Security;
use League\Flysystem\StorageAttributes;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateRegistryCommand extends CoreCommand
{
	protected function configure()
	{
		$this->setName('users:update-registry')
			 ->setDescription('Update Users Registry Index')
			 ->setHelp('Publish changes to the Users configuration profile data');
	}

	protected function initialize(InputInterface $in, OutputInterface $out): void
	{
		parent::initialize($in, $out);
		Security::setSalt(env('ORGANIZATION_ID'));
	}

	protected function execute(InputInterface $in, OutputInterface $out): int
	{
		$fs = DigitalOceanSpacesService::init('registry/users');

		if ($fs->has('users.json')) {
			$this->out->writeln('Loading Users Registry Index');
		} else {
			$users = [];
		}

		foreach ($fs->listContents(DS)->filter(fn (StorageAttributes $attributes) => $attributes->isFile()) as $item) {
			if ($item->path() === 'users.json') {
				continue;
			}

			$user = json_decode(Security::decrypt($fs->read($item->path()), env('ORGANIZATION_KEY')), true);
			ray($user);
		}

		$this->out->writeln('Users Registry Index is Updated');

		return CoreCommand::SUCCESS;
	}
}
