<?php

namespace OpenArchitecture\RestfulMvc;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;

/**
 * Class Module
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
final class Module implements ConfigProviderInterface, DependencyIndicatorInterface
{
    /**
     * Returns configuration to merge with application configuration
     *
     * @return array|\Traversable Include the values: router, controllers, service_manager, input_filters, view_helpers,
     *                            view_manager, log, auth_adapter and hydrators.
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Expected to return an array of modules on which the current one depends on
     *
     * @return array
     */
    public function getModuleDependencies()
    {
        return array('OpenArchitecture\Restful');
    }
}