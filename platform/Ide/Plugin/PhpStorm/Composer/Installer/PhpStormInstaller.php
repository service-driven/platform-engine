<?php

namespace EventDriven\PhpStormComposerPlugin\Composer\Installer;

use Composer\Installer\InstallerInterface;

/**
 * Class PhpStormConfigInstaller
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   EventDriven\PhpStormComposerPlugin\Composer\Installer
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PhpStormInstaller extends AbstractInstaller implements InstallerInterface
{
    /**
     * @var array
     */
    protected $locations = array(
        'project' => '.idea/{$name}.iml',
        'component' => '.idea/{$name}.xml',
    );

    /**
     * @var array
     */
    protected $packageTypes = array(
        'phpstorm-project',
        'phpstorm-component',
    );


    /**
     * For an installer to override to modify the vars per installer.
     *
     * @param  array $vars
     * @return array
     */
    public function inflectPackageVars($vars)
    {
        $vars['name'] = strtolower(str_replace(array('-', '_'), ' ', $vars['name']));
        $vars['name'] = str_replace(' ', '', ucwords($vars['name']));

        return $vars;
    }
}