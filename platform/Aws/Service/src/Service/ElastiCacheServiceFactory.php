<?php

namespace Simplicity\AwsPlatform\Service;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ElastiCacheServiceFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\AwsPlatform\Service
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ElastiCacheServiceFactory implements FactoryInterface
{

    /**
     * Create an object
     *
     * @param  ContainerInterface $container
     * @param  string $requestedName
     * @param  null|array $options
     * @return object
     * @throws ServiceNotFoundException if unable to resolve the service.
     * @throws ServiceNotCreatedException if an exception is raised when
     *     creating a service.
     * @throws ContainerException if any other error occurs
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var Sdk $awsService */
        $awsService = $container->get('Aws\Sdk');

        $config = $container->get('Config');
        $awsConfig = $config['aws'];

        return new ElastiCacheService($awsService, $awsConfig);
    }
}
