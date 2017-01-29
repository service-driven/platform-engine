<?php

namespace Warehouse\StrategyManager;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * Class StrategyManagerFactory
 *
 * PHP Version 7
 *
 * @category  PHP
 * @package   Warehouse\StrategyManager
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PickingStrategyManagerFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = PickingStrategyManager::class;
}
