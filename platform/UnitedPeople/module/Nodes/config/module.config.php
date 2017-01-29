<?php

namespace Nodes;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Nodes\Entity\Node;
use Nodes\Entity\NodeCollection;
use Nodes\Listener\NodeResourceListener;
use Nodes\Listener\NodeResourceListenerFactory;
use Nodes\ServiceManager\NodeManager;
use Nodes\ServiceManager\NodeManagerFactory;
use Zend\Hydrator\Reflection;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'rest' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api',
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'nodes' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/nodes[/:node_id]',
                            'defaults' => [
                                'controller' => 'Node\Controller\NodeRestController',
                            ],
                        ],
                    ],
                ],
            ],
            'nodes' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/nodes[[/:action]/:node_id]',
                    'defaults' => [
                        'controller' => Controller\NodeController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\NodeController::class => InvokableFactory::class,
        ],
    ],

    'doctrine' => [
        'driver' => [
            'node_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => __DIR__ . '/../src/Entity',
            ],
            'orm_default' => [
                'drivers' => [
                    'Nodes\Entity' => 'node_driver',
                ],
            ],
        ],
    ],

    'zf-rest' => [
        'Node\Controller\NodeRestController' => [
            'listener' => NodeResourceListener::class,
            'route_name' => 'api/networking',
            'route_identifier_name' => 'network_id',
            'collection_name' => 'items',
            'collection_http_methods' => [
                'get',
            ],
            'entity_http_methods' => [
                'get',
            ],
            'collection_query_whitelist' => [
                'filter',
                'sort',
            ],
            'page_size' => 10,
            'entity_class' => Node::class,
            'collection_class' => NodeCollection::class,
        ],
    ],

    'zf-hal' => [
        'metadata_map' => [
            Node::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'rest/nodes',
                'route_identifier_name' => 'node_id',
                'hydrator' => Reflection::class,
            ],
            NodeCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'rest/nodes',
                'hydrator' => Reflection::class,
                'is_collection' => true,
            ],
        ],
    ],

    'service_manager' => [
        'factories' => [
            Node::class => InvokableFactory::class,
            NodeCollection::class => InvokableFactory::class,
            NodeManager::class => NodeManagerFactory::class,
            NodeResourceListener::class => NodeResourceListenerFactory::class,
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
