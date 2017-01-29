<?php

namespace OpenArchitecture\RestfulCache\Controller;

use OpenArchitecture\Cache\Client\RedisClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class CacheControllerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulCache\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class CacheControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $controllerManager The controller manager.
     *
     * @return CacheController
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        /** @var ServiceLocatorAwareInterface $controllerManager */
        $serviceLocator = $controllerManager->getServiceLocator();
        /** @var RedisClient $redisClient */
        $redisClient = $serviceLocator->get(RedisClient::class);

        $config = $serviceLocator->get('Config');
        $redisConfig = $config['cache']['redis'];

        $indexRestController = new CacheController($redisClient, $redisConfig);

        return $indexRestController;
    }
}