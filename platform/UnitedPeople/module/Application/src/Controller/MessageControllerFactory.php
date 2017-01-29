<?php

namespace Application\Controller;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use RabbitMQ\Service\RabbitMQ;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class MessageControllerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Application\Controller
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class MessageControllerFactory implements FactoryInterface
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
        $messageQueue = $container->get(RabbitMQ::class);

        return new MessageController($messageQueue);
    }
}
