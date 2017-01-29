<?php

namespace Warehouse\StrategyManager;

use Warehouse\Strategy\PickingStrategyInterface;
use Zend\Mvc\Exception\InvalidPluginException;
use Zend\ServiceManager\AbstractPluginManager;

/**
 * Class StrategyManager
 *
 * PHP Version 7
 *
 * @category  PHP
 * @package   Warehouse\StrategyManager
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class PickingStrategyManager extends AbstractPluginManager
{
    /**
     * Validate the plugin
     *
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param  mixed $plugin The cron resource plugin.
     *
     * @return void
     * @throws InvalidPluginException if invalid
     */
    public function validate($plugin)
    {
        if ($plugin instanceof PickingStrategyInterface) {
            // we're okay
            return;
        }

        throw new InvalidPluginException(sprintf('Plugin of type %s is invalid; must implement %s',
                (is_object($plugin) ? get_class($plugin) : gettype($plugin)), PickingStrategyInterface::class));
    }
}
