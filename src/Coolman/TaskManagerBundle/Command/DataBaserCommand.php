<?php

namespace Coolman\TaskManagerBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputArgument;

class DataBaserCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('database:wipe')
            ->setDescription('Drops database and then creates database, schemas and fixtures again')
            ->setHelp('help');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $emptyInput = new ArrayInput(['']);
            $forceInput = new ArrayInput([
                '--force' => true,
                ''
            ]);

            $output->writeln("Started...");
            if (
                !$this->getApplication()->find('doctrine:database:drop')->run($forceInput, $output) &&
                !$this->getApplication()->find('doctrine:database:create')->run($emptyInput, $output) &&
                !$this->getApplication()->find('doctrine:schema:create')->run($emptyInput, $output)
                //!$this->getApplication()->find('fos:user:create')->run($userInput, $output) &&
            )
                $output->writeln('<info>Wiped successfully</info>');
            else
                $output->writeln('<error>Some error occurred</error>');
        } catch (\Exception $ex) {
            $output->writeln('<error>Some error occurred</error>');
            $output->writeln(sprintf("<message>%s</message>", $ex->getMessage()));
        }

    }
}
