<?php

namespace Simplicity\AwsPlatform;

use Zend\Mvc\Router\Console\Simple;

return array(
    'console' => array(
        'router' => array(
            'routes' => array(
                'aws-platform' => array(
                    'type'    => Simple::class,
                    'options' => array(
                        'route'    => 'aws cache',
                        'defaults' => array(
                            'controller' => Controller\CacheController::class,
                            'action'     => 'index',
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'factories' => array(
            Controller\CacheController::class => Controller\CacheControllerFactory::class,
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            Service\ElastiCacheService::class => Service\ElastiCacheServiceFactory::class,
        ),
    ),
);