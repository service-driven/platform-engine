<?php

namespace Authentication;

use Authentication\Service\AuthenticationService;
use Authentication\Service\AuthenticationServiceFactory;
use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'auth' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/auth[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                    'constraints' => [
                        'action'     => '(index|process)',
                    ],
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'xing' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/xing[/:action]',
                            'defaults' => [
                                'controller' => Controller\XingController::class,
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => Controller\IndexControllerFactory::class,
            Controller\XingController::class => Controller\XingControllerFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            AuthenticationService::class => AuthenticationServiceFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
