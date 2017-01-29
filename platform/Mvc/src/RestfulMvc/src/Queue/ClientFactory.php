<?php

namespace OpenArchitecture\RestfulMvc\Queue;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class ClientFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   OpenArchitecture\RestfulMvc\Queue
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class ClientFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return Client
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new Client();
    }
}