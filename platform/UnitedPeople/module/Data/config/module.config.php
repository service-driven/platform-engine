<?php

namespace Data;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'data' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/data/data[/:action]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'analyses' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/data/analyses[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\AnalysisController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'competitors' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/data/competitors[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\CompetitorController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'reports' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/data/reports[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\ReportController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'data-types' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/data/data-types[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\DataTypeController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\AnalysisController::class => InvokableFactory::class,
            Controller\CompetitorController::class => InvokableFactory::class,
            Controller\DataTypeController::class => InvokableFactory::class,
            Controller\IndexController::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
