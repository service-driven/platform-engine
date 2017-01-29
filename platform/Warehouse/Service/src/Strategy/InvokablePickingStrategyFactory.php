<?php

namespace Warehouse\Strategy;

use Indent\Service\Data\IndentDataService;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class InvokablePickingStrategyFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Warehouse\Strategy
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2017 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class InvokablePickingStrategyFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string             $requestedName
     * @param  null|array         $options
     *
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var IndentDataService $indentDataService */
        $indentDataService = $container->get(IndentDataService::class);

        if (null === $options) {
            return new $requestedName($indentDataService);
        }

        return new $requestedName($indentDataService, $options);
    }
}
