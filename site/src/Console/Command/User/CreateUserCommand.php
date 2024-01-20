<?php

namespace App\Console\Command\User;

use App\Console\Command\CoreCommand;
use App\Service\Storage\DigitalOceanSpacesService;
use Cake\Utility\Security;
use Cake\Utility\Text;
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
			->setHelp('Create a new User to access the Online Site Manager (OSM) for Spark.');
	}

	protected function initialize(InputInterface $in, OutputInterface $out): void
	{
		parent::initialize($in, $out);
		Security::setSalt(env('ORGANIZATION_ID'));
	}

	protected function execute(InputInterface $in, OutputInterface $out): int
	{
		ray()->clearScreen();

		$user = [
			'$schema' => [
				'resource' => 'user',
				'version' => '0.1.0',
			],
			'id' => null,
			'name' => [
				'first' => null,
				'last' => null
			],
			'credentials' => [
				'username' => null,
				'password' => null,
				'status' => null,
			],
			'roles' => [],
			'contact' => [
				'email' => [
					'address' => null,
					'type' => null,
					'verified' => null,
				],
				'phone' => [
					'number' => null,
					'type' => null,
					'verified' => null,
				],
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

		/** @todo use setValidator() to check for duplicate user */
		$user['credentials']['username'] = $helper->ask($this->in, $this->out, new Question("Email Address: "));

		$password['value'] = $helper->ask($this->in, $this->out, (new Question("Password: "))->setHidden(true)->setHiddenFallback(false));
		$password['confirm'] = $helper->ask($this->in, $this->out, (new Question("Confirm Password: "))->setHidden(true)->setHiddenFallback(false)->setValidator(function ($value) use ($password) {
			if ($value !== $password['value']) {
				throw new RuntimeException('Passwords do not match');
			}

			return $value;
		}));

		$user['credentials']['password'] = password_hash($password['value'], PASSWORD_BCRYPT);

		$user['id'] = strtoupper(str_replace('-', '', Text::uuid()));
		$user['contact']['email']['address'] = $user['credentials']['username'];

		ray($user, $password);

		$event = [
			'type' => 'user.create',
			'when' => time(),
			'by' => [
				'id' => env('ORGANIZATION_ID'),
				'name' => 'System',
			],
			'with' => [
				'what' => 'user',
				'from' => null,
				'to' => $user,
			],
		];

		if (!isset($user['events'])) {
			$user['events'] = [];
		}

		$user['events'][$event['when']] = $event;

		ray($user);

		$badge = [
			'$schema' => [
				'resource' => 'badge',
				'version' => '0.1.0',
			],
			'username' => $user['credentials']['username'],
		];

		$badgeID = strtoupper(Security::hash(json_encode($badge), 'md5', true));

		ray($badgeID);

		$fs = DigitalOceanSpacesService::init('registry/users');

		$fs->write($badgeID . '.json', Security::encrypt(json_encode($user), env('ORGANIZATION_KEY')));

		return CoreCommand::SUCCESS;
	}
}
