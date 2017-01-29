<?php

namespace Simplicity\StackEngine\Docker\Service;

use Docker\Docker;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class DockerServiceFactory
 *
 * PHP Version 5
 *
 * @category  Simplicity\StackEngine\Docker\Service
 * @package   Service
 * @author    Simplicity Trade GmbH <it@simplicity.ag>
 * @copyright 2014-2016 Simplicity Trade GmbH
 * @license   Proprietary http://www.simplicity.ag
 */
class DockerServiceFactory implements FactoryInterface
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
        $docker = new Docker();

        return new DockerService($docker);
    }
}