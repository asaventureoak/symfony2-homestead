<?php namespace Laravel\Homestead;

use Symfony\Component\Process\Process;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ProvisionCommand extends Command {

	/**
	 * Configure the command options.
	 *
	 * @return void
	 */
	protected function configure()
	{
		$this->setName('up')
			->setDescription('Provisions the running Homestead machine');
	}

	/**
	 * Execute the command.
	 *
	 * @param  \Symfony\Component\Console\Input\InputInterface  $input
	 * @param  \Symfony\Component\Console\Output\OutputInterface  $output
	 * @return void
	 */
	public function execute(InputInterface $input, OutputInterface $output)
	{
		$command = 'vagrant provisiom';

		$process = new Process($command, realpath(__DIR__.'/../'), $_ENV, null, null);

		$process->run(function($type, $line) use ($output)
		{
			$output->write($line);
		});
	}

}