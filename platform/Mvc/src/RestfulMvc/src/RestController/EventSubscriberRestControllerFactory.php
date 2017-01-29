<?php

namespace OpenArchitecture\RestfulMvc\RestController;

use OpenArchitecture\Cache\Client\RedisClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class EventSubscriberRestControllerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\RestController
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class EventSubscriberRestControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $controllerManager The controller manager.
     *
     * @return EventSubscriberRestController
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        /** @var ServiceLocatorAwareInterface $controllerManager */
        $serviceLocator = $controllerManager->getServiceLocator();

        $eventSubscriberRestController = new EventSubscriberRestController();

        return $eventSubscriberRestController;
    }
}