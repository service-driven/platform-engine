<?php

namespace Simplicity\MessageQueue\Client;

use Redis;
use Simplicity\Cache\Client\ClientConfiguration;
use Simplicity\Cache\Client\ClientConfigurationInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class RedisClientFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\MessageQueue\Client
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class RedisClientFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator The service locator.
     *
     * @return Redis
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        $redisConfig = $config['cache']['redis'];
        /** @var ClientConfigurationInterface $readConfig */
        $config = new ClientConfiguration($redisConfig['read']);

        $client = new RedisClient();
        $client->pconnect($config->getHost(), $config->getPort(), $config->getTimeout());

        $password = $config->getPassword();
        if ($password != null) {
            $client->auth($password);
        }

        return $client;
    }
}