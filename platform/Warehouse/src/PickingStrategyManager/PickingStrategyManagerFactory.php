<?php

namespace Warehouse\PickingStrategyManager;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * Class PickingStrategyManagerFactory
 *
 * PHP Version 7
 *
 * @category  PHP
 * @package   Warehouse\PickingStrategyManager
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PickingStrategyManagerFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = PickingStrategyManager::class;
}