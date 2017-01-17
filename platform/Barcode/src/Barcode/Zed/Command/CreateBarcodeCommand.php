<?php

namespace PlatformEngine\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateBarcodeCommand extends Command
{

    protected function configure()
    {
        $this// the name of the command (the part after "bin/console")
            ->setName('app:create-barcode')
            ->setDescription('Creates new users.')
            ->setHelp("This command allows you to create users...")
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        // outputs a message followed by a "\n"
        $output->writeln('Whoa!');

        // outputs a message without adding a "\n" at the end of the line
        $output->write('You are about to ');
        $output->write('create a user.');
    }
}