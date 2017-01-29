<?php

namespace Application\Controller;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


/**
 * Class WarehouseConsoleControllerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class WarehouseConsoleControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $controllerManager The controller manager.
     *
     * @return RouterConsoleController
     */
    public function createService(ServiceLocatorInterface $controllerManager) : RouterConsoleController
    {
        return $this($controllerManager);
    }

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     *
     * @return WarehouseConsoleController
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ) : WarehouseConsoleController {
        $config = $container->get('Config');

        return new WarehouseConsoleController($config);
    }
}