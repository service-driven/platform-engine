<?php

namespace Controller;

use Zend\Mvc\Service\ServiceManagerConfig;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ServiceConfigControllerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ServiceManagerConfigControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $controllerManager The controller manager.
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        /** @var ServiceLocatorAwareInterface $controllerManager */
        $serviceLocator = $controllerManager->getServiceLocator();

        $applicationConfig = $serviceLocator->get('ApplicationConfig');

        $serviceManagerConfig = new ServiceManagerConfig($applicationConfig['service_manager']);

        return new ServiceManagerConfigController($serviceManagerConfig);
    }
}