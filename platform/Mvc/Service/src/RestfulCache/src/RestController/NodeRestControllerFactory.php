<?php

namespace OpenArchitecture\RestfulCache\RestController;

use OpenArchitecture\Cache\Client\RedisClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class NodeRestControllerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulCache\RestController
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class NodeRestControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $controllerManager The controller manager.
     *
     * @return NodeRestController
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        /** @var ServiceLocatorAwareInterface $controllerManager */
        $serviceLocator = $controllerManager->getServiceLocator();
        /** @var RedisClient $redisClient */
        $redisClient = $serviceLocator->get(RedisClient::class);

        $config = $serviceLocator->get('Config');
        $redisConfig = $config['cache']['redis'];

        $nodeRestController = new NodeRestController($redisClient, $redisConfig);

        return $nodeRestController;
    }
}