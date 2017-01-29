<?php

namespace Application\ServiceManager;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

/**
 * Class ExporterManagerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\ServiceManager
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ExporterManagerFactory extends AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = 'Application\ServiceManager\ExporterManager';
}
