<?php

namespace Nodes\ServiceManager;

use InvalidArgumentException;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;

/**
 * Class NodeManager
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Node\ServiceManager
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class NodeManager extends AbstractPluginManager
{
    protected $instanceOf = Plugin\NodeInterface::class;

    /**
     * Validate the plugin
     *
     * Checks that the filter loaded is either a valid callback or an instance
     * of FilterInterface.
     *
     * @param mixed $plugin The plugin.
     *
     * @return void
     * @throws Exception\RuntimeException if invalid.
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof $this->instanceOf) {
            return;
        }

        throw new InvalidArgumentException(
            sprintf(
                'Plugin of type %s is invalid; must implement %s\Plugin\PluginInterface',
                (is_object($plugin) ? get_class($plugin) : gettype($plugin)),
                __NAMESPACE__
            )
        );
    }
}
