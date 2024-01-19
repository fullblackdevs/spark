<?php
namespace App\Console\Command;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class CoreCommand extends Command
{
	protected InputInterface $in;

	protected OutputInterface $out;

    public function __construct()
    {
        parent::__construct();
    }

	protected function initialize(InputInterface $in, OutputInterface $out)
	{
		$this->in = $in;
		$this->out = $out;
	}
}
