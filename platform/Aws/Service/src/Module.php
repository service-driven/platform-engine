<?php

namespace Simplicity\AwsPlatform;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Class Module
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\AwsPlatform
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Module implements ConfigProviderInterface
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
}