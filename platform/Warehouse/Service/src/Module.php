<?php

namespace OrderPicking;

use Warehouse\PickingStrategyManager\Feature\PickingStrategiesProviderInterface;
use Warehouse\PickingStrategyManager\PickingStrategyManager;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\Listener\ServiceListenerInterface;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\ModuleManagerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class Module
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OrderPicking
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Module implements ConfigProviderInterface, InitProviderInterface
{

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Init
     *
     * @param ModuleManagerInterface $manager
     *
     * @return void
     */
    public function init(ModuleManagerInterface $manager)
    {
        /** @var ModuleManager $manager */
        /** @var ServiceLocatorInterface $sm */
        $sm = $manager->getEvent()->getParam('ServiceManager');

        /** @var ServiceListenerInterface $serviceListener */
        $serviceListener = $sm->get('ServiceListener');

        $serviceListener->addServiceManager(PickingStrategyManager::class, 'picking_manager',
            PickingStrategiesProviderInterface::class, 'getPickingConfig');
    }
}