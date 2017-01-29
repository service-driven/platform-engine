<?php

namespace Simplicity\AwsPlatform\Controller;

use Simplicity\AwsPlatform\Service\ElastiCacheService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class CacheControllerFactory
 *
 * PHP Version 5
 *
 * @category  PHP
 * @package   Simplicity\AwsPlatform\Controller
 * @author    Simplicity Trade GmbH <development@simplicity.ag>
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

        /** @var ElastiCacheService $elastiCacheService */
        $elastiCacheService = $serviceLocator->get(ElastiCacheService::class);

//        $securityTokenService = new StsClient($config);
//        $securityToken = $securityTokenService->getSessionToken();

        return new CacheController($elastiCacheService);
    }
}