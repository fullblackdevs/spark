<?php
namespace App\Console\Command\User;

use App\Console\Command\CoreCommand;
use RuntimeException;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\ArrayInput;

class CreateUserCommand extends CoreCommand
{
	protected function configure()
	{
		$this->setName('user:create')
			->setDescription('Create a new user')
			->setHelp('This command allows you to create a user...');
	}

	protected function execute(InputInterface $in, OutputInterface $out): int
	{
		$user = [
			'name' => [
				'first' => null,
				'last' => null
			],
			'credentials' => [
				'username' => null,
				'password' => null,
			],
			'contact' => [
				'email' => null,
			],
		];

		$password = [
			'value' => null,
			'confirm' => null,
		];

		/** @var QuestionHelper $helper */
		$helper = $this->getHelper('question');

		$this->out->writeln('Please enter the following information for the new User:');
		$user['name']['first'] = $helper->ask($this->in, $this->out, new Question("First Name: "));
		$user['name']['last'] = $helper->ask($this->in, $this->out, new Question("Last Name: "));
		$user['credentials']['username'] = $helper->ask($this->in, $this->out, new Question("Email Address: "));

		$password['value'] = $helper->ask($this->in, $this->out, (new Question("Password: "))->setHidden(true)->setHiddenFallback(false));
		$password['confirm'] = $helper->ask($this->in, $this->out, (new Question("Confirm Password: "))->setHidden(true)->setHiddenFallback(false)->setValidator(function ($value) use ($password) {
			if ($value !== $password['value']) {
				throw new RuntimeException('Passwords do not match');
			}

			return $value;
		}));

		$user['credentials']['password'] = password_hash($password['value'], PASSWORD_BCRYPT);

		$returnCode = $this->getApplication()->doRun(new ArrayInput([
			'command' => 'users:update',
			'--data' => json_encode([
				'users' => [
					$user
				]
			]),
		]), $this->out);

		ray($user, $password);

		return CoreCommand::SUCCESS;
	}
}
