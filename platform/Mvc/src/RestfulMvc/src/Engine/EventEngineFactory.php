<?php

namespace OpenArchitecture\RestfulMvc\Engine;

use OpenArchitecture\RestfulMvc\Listener\DefaultListenerAggregate;
use Zend\ModuleManager\ModuleEvent;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class EventEngineFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\Engine
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class EventEngineFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $configuration = $serviceLocator->get('ApplicationConfig');

        $listenerOptions = array();
        $defaultListeners = new DefaultListenerAggregate($listenerOptions);
        $serviceListener  = $serviceLocator->get('ServiceListener');

//        $serviceListener->addServiceManager(
//            $serviceLocator,
//            'application_manager',
//            'OpenArchitecture\RestfulApplication\Feature\ApplicationProviderInterface',
//            'getApplicationConfig'
//        );

        $eventManager = $serviceLocator->get('EventManager');
        $eventManager->attach($defaultListeners);
        $eventManager->attach($serviceListener);

        $moduleEvent = new ModuleEvent();
        $moduleEvent->setParam('ServiceManager', $serviceLocator);

        $eventEngine = new EventEngine($eventManager);
        $eventManager->setEvent($moduleEvent);

        return $eventEngine;
    }
}