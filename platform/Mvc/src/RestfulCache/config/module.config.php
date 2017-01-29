<?php

namespace OpenArchitecture\RestfulCache;

use Zend\Mvc\Router\Http\Literal;
use Zend\Mvc\Router\Http\Segment;

return array(
    'controllers' => array(
        'factories' => array(
            Controller\CacheController::class        => Controller\CacheControllerFactory::class,
            RestController\ItemRestController::class => RestController\ItemRestControllerFactory::class,
            RestController\NodeRestController::class => RestController\NodeRestControllerFactory::class,
        ),
    ),

    'router' => array(
        'routes' => array(
            'rest-api' => array(
                'child_routes' => array(
                    'cache' => array(
                        'type'          => Literal::class,
                        'options'       => array(
                            'route'    => '/cache',
                            'defaults' => array(
                                'controller' => Controller\CacheController::class,
                                'action'     => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes'  => array(
                            'items' => array(
                                'type'    => Segment::class,
                                'options' => array(
                                    'route'    => '/items[/:item_id]',
                                    'defaults' => array(
                                        'controller' => RestController\ItemRestController::class,
                                        'action'     => null,
                                    ),
                                ),
                            ),
                            'nodes' => array(
                                'type'    => Segment::class,
                                'options' => array(
                                    'route'    => '/nodes[/:node_id]',
                                    'defaults' => array(
                                        'controller' => RestController\NodeRestController::class,
                                        'action'     => null,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);