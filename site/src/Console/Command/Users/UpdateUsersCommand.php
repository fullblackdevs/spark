<?php
namespace App\Console\Command\Users;

use App\Console\Command\CoreCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateUsersCommand extends CoreCommand
{
	protected function configure()
	{
		$this->setName('users:update')
			 ->setDescription('Update Users configuration data')
			 ->setHelp('Publish changes to the Users configuration profile data');
	}

	protected function execute(InputInterface $in, OutputInterface $out): int
	{
		$this->out->writeln('Users Configuration Data Updated');

		return CoreCommand::SUCCESS;
	}
}
