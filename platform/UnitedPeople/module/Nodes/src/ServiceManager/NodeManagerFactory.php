<?php

namespace Nodes\ServiceManager;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * Class NodeManagerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Node\ServiceManager
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class NodeManagerFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = 'Application\ServiceManager\NodeManager';
}
