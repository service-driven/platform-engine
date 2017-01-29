<?php

namespace OpenArchitecture\RestfulMvc;

use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\Segment;

return array(
    'router' => array(
        'routes' => array(
            'rest-api' => array(
                'may_terminate' => true,
                'child_routes' => array(
                    'mvc' => array(
                        'type' => Literal::class,
                        'options' => array(
                            'route' => '/mvc',
                            'defaults' => array(
                                'controller' => Controller\IndexController::class,
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'application' => array(
                                'type' => Segment::class,
                                'options' => array(
                                    'route' => '/application[/:action]',
                                    'defaults' => array(
                                        'controller' => Controller\ApplicationController::class,
                                    ),
                                ),
                            ),
                            'applications' => array(
                                'type' => Segment::class,
                                'options' => array(
                                    'route' => '/applications[/:application_id]',
                                    'defaults' => array(
                                        'controller' => RestController\ApplicationRestController::class,
                                        'action' => null,
                                    ),
                                ),
                            ),
                            'events' => array(
                                'type' => Segment::class,
                                'options' => array(
                                    'route' => '/events[/:event_id]',
                                    'defaults' => array(
                                        'controller' => RestController\EventRestController::class,
                                        'action' => null,
                                    ),
                                ),
                                'may_terminate' => true,
                                'child_routes' => array(
                                    'managers' => array(
                                        'type' => Segment::class,
                                        'options' => array(
                                            'route' => '/managers[/:manager_id]',
                                            'defaults' => array(
                                                'controller' => RestController\EventManagerRestController::class,
                                                'action' => null,
                                            ),
                                        ),
                                        'may_terminate' => true,
                                        'child_routes' => array(
                                            'trigger' => array(),
                                            'attach' => array(),

                                            'identifiers' => array(
                                                'type' => Segment::class,
                                                'options' => array(
                                                    'route' => '/identifiers[/:identifier_id]',
                                                    'defaults' => array(
                                                        'controller' => RestController\IdentifierRestController::class,
                                                        'action' => null,
                                                    ),
                                                ),
                                            ),
                                        ),
                                    ),
                                    'subscribers' => array(
                                        'type' => Segment::class,
                                        'options' => array(
                                            'route' => '/subscribers[/:subscriber_id]',
                                            'defaults' => array(
                                                'controller' => RestController\EventSubscriberRestController::class,
                                            ),
                                        ),
                                    ),
                                    'messages' => array(
                                        'type' => Segment::class,
                                        'options' => array(
                                            'route' => '/messages[/:message_id]',
                                            'defaults' => array(
                                                'controller' => RestController\EventMessageRestController::class,
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'controllers' => array(
        'invokables' => array(
            Controller\IndexController::class => Controller\IndexController::class,
        ),
        'factories' => array(
            Controller\ApplicationController::class => Controller\ApplicationControllerFactory::class,

            RestController\ApplicationRestController::class => RestController\ApplicationRestControllerFactory::class,
            RestController\EventMessageRestController::class => RestController\EventMessageRestControllerFactory::class,
            RestController\EventRestController::class => RestController\EventRestControllerFactory::class,
            RestController\EventSubscriberRestController::class => RestController\EventSubscriberRestControllerFactory::class,
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            Queue\Client::class => Queue\ClientFactory::class,
        ),
    ),

    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);