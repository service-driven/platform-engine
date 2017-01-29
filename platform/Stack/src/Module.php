<?php

namespace Simplicity\StackEngine;

use Simplicity\AnalyzeEngine\Engine\AnalyzeEngine;
use Simplicity\Cache\Event\CacheEvent;
use Zend\EventManager\EventInterface;
use Zend\EventManager\StaticEventManager;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Class Module
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\StackEngine
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
        /** @var StaticEventManager $events */
        $events = StaticEventManager::getInstance();

        $events->attach(
            AnalyzeEngine::class, CacheEvent::EVENT_CACHE_ITEM_CREATE, function (CacheEvent $cacheEvent) {
        }
        );
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