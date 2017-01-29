<?php

namespace Subscriber;

use Simplicity\MessageQueue\Subscriber\Subscriber;
use Simplicity\Simplicity\MessageQueue\Client\RedisClient;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class SubscriberFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Subscriber
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class SubscriberFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        ini_set('default_socket_timeout', -1);

        /** @var RedisClient $redis */
        $redis = $serviceLocator->get(RedisClient::class);

        return new Subscriber($redis);
    }
}