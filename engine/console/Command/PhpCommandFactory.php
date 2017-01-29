<?php

namespace PlatformEngine\Engine\Console\Command;

/**
 * Class PhpCommandFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   PlatformEngine\Engine\Console\Command
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PhpCommandFactory
{
    public static function createCommands()
    {
        return [
            new PhpCommand('version', '-v'),
            new PhpCommand('modules', '-m'),
            new PhpCommand('info', '-i'),
            new PhpCommand('ini', '--ini'),
        ];
    }

}
