<?php

namespace Vision;

use Vision\Controller\GoalControllerFactory;
use Vision\DataService\GoalDataService;
use Vision\DataService\GoalDataServiceFactory;
use Vision\Service\GoalService;
use Vision\Service\GoalServiceFactory;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'goals' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/vision/goals[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\GoalController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'strategies' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/vision/strategies[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\StrategyController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'videos' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/vision/videos[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\VideoController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'courses' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/vision/courses[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\CourseController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'events' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/vision/events[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\EventController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'tasks' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/vision/tasks[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\TaskController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'radars' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/vision/radars[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\RadarController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'issues' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/vision/issues[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\IssueController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\GoalController::class => GoalControllerFactory::class,
            Controller\StrategyController::class => InvokableFactory::class,
            Controller\VideoController::class => InvokableFactory::class,
            Controller\CourseController::class => InvokableFactory::class,
            Controller\EventController::class => InvokableFactory::class,
            Controller\TaskController::class => InvokableFactory::class,
            Controller\RadarController::class => InvokableFactory::class,
            Controller\IssueController::class => InvokableFactory::class,
        ],
    ],
    'service_manager' => [
        'factories' => [
            GoalDataService::class => GoalDataServiceFactory::class,
            GoalService::class => GoalServiceFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
