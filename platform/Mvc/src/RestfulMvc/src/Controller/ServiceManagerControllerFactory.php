<?php

namespace Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ServiceManagerControllerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ServiceManagerControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $controllerManager The controller manager.
     *
     * @return ServiceManagerController
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        /** @var ServiceLocatorAwareInterface $controllerManager */
        $serviceLocator = $controllerManager->getServiceLocator();

        return new ServiceManagerController($serviceLocator);
    }
}