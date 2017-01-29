<?php

namespace EventDriven\PhpStormComposerPlugin\Composer\Command;

use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ValidateCommand
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   EventDriven\PhpStormComposerPlugin\Composer\Command
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ValidateCommand extends BaseCommand
{
    protected function configure()
    {
        $this->setName('phpstorm-config-validate');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Executing');
    }
}