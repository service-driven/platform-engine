<?php

namespace Simplicity\EventDrivenCache;

use Zend\EventManager\EventInterface;
use Zend\EventManager\SharedEventManager;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\Mvc\Application;
use Zend\Mvc\MvcEvent;

/**
 * Class Module
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\EventDrivenCache
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class Module implements BootstrapListenerInterface, ConfigProviderInterface
{
    /**
     * @param EventInterface $event The event.
     *
     * @return void
     */
    public function onBootstrap(EventInterface $event)
    {
        /** @var MvcEvent $mvcEvent */
        $mvcEvent = $event;

        /** @var Application $app */
        $app = $mvcEvent->getApplication();

        $eventManager = $app->getEventManager();
        $serviceManager = $app->getServiceManager();

        /** @var SharedEventManager $sharedEventManager */
        $sharedEventManager = $eventManager->getSharedManager();
    }

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