<?php

namespace Application;

use Application\ServiceManager\ExporterManager;
use Application\ServiceManager\ExporterManagerFactory;
use Application\ServiceManager\ImporterManager;
use Application\ServiceManager\ImporterManagerFactory;
use Zend\I18n\View\Helper\Translate;
use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'calendars' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application/calendars[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\CalendarController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'messages' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/application/messages[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\MessageController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\CalendarController::class => InvokableFactory::class,
            Controller\IndexController::class => InvokableFactory::class,
            Controller\MessageController::class => InvokableFactory::class,
        ],
    ],

    'service_manager' => [
        'factories' => [
            ExporterManager::class => ExporterManagerFactory::class,
            ImporterManager::class => ImporterManagerFactory::class,
        ],
    ],

    'view_helpers' => [
        'factories' => [
            Translate::class => InvokableFactory::class,
        ],
        'aliases' => [
            'translate' => Translate::class,
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'layout' => 'layout/application',
        'template_map' => [
            'layout/application' => __DIR__ . '/../view/layout/application.phtml',
            'layout/default' => __DIR__ . '/../view/layout/default.phtml',

            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => array(
            'ViewJsonStrategy',
            'ViewFeedStrategy',
        ),
    ],
];
