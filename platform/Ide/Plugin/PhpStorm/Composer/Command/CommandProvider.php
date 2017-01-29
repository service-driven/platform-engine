<?php

namespace EventDriven\PhpStormComposerPlugin\Composer\Command;

use Composer\Command\BaseCommand;
use Composer\Plugin\Capability\CommandProvider as CommandProviderInterface;

/**
 * Class CommandProvider
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   EventDriven\PhpStormComposerPlugin\Composer\Command
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class CommandProvider implements CommandProviderInterface
{
    /**
     * Retreives an array of commands
     *
     * @return BaseCommand[]
     */
    public function getCommands()
    {
        return array(
            new ValidateCommand(),
        );
    }
}