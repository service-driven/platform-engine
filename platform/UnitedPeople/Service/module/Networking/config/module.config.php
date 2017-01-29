<?php

namespace Networking;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Networking\Controller\ImporterControllerFactory;
use Networking\Entity\NetworkCollection;
use Networking\Entity\Network;
use Networking\Importer\XingImporter;
use Networking\Importer\XingImporterFactory;
use Networking\Resource\ResourceListener;
use Networking\Resource\ResourceListenerFactory;
use Networking\Service\ExporterService;
use Networking\Service\ExporterServiceFactory;
use Networking\Service\ImporterService;
use Networking\Service\ImporterServiceFactory;
use Zend\Hydrator\Reflection;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'api' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/api',
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'networking' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/networking[/:network_id]',
                            'defaults' => [
                                'controller' => 'Indent\Controller\NetworkRestController',
                            ],
                        ],
                    ],
                ],
            ],


            'networking' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/networking/networking[[/:action]/:id]',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'people' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/networking/people[[/:action]/:id]',
                    'defaults' => [
                        'controller' => Controller\PersonController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'groups' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/networking/groups[[/:action]/:id]',
                    'defaults' => [
                        'controller' => Controller\GroupController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'companies' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/networking/companies[[/:action]/:id]',
                    'defaults' => [
                        'controller' => Controller\CompanyController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'clusters' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/networking/clusters[[/:action]/:id]',
                    'defaults' => [
                        'controller' => Controller\ClusterController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'portals' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/networking/portals[[/:action]/:id]',
                    'defaults' => [
                        'controller' => Controller\PortalController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'importers' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/networking/importers[[/:action]/:id]',
                    'defaults' => [
                        'controller' => Controller\ImporterController::class,
                        'action' => 'index',
                    ],
                ],
            ],
            'exporters' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/networking/exporters[[/:action]/:id]',
                    'defaults' => [
                        'controller' => Controller\ExporterController::class,
                        'action' => 'index',
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\CompanyController::class => InvokableFactory::class,
            Controller\GroupController::class => InvokableFactory::class,
            Controller\IndexController::class => InvokableFactory::class,
            Controller\PersonController::class => InvokableFactory::class,
            Controller\ClusterController::class => InvokableFactory::class,
            Controller\PortalController::class => InvokableFactory::class,

            Controller\ImporterController::class => Controller\ImporterControllerFactory::class,
            Controller\ExporterController::class => Controller\ExporterControllerFactory::class,
        ],
    ],

    'doctrine' => [
        'driver' => [
            'network_driver' => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => __DIR__ . '/../src/Entity',
            ],
            'orm_default' => [
                'drivers' => [
                    'Networking\Entity' => 'network_driver',
                ],
            ],
        ],
    ],

    'doctrine-hydrator' => [
        'Networking\Hydrator\NetworkHydrator' => [
            'entity_class' => Network::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'use_generated_hydrator' => true,
        ],
    ],

    'zf-rest' => [
        'Networking\Controller\NetworkController' => [
            'listener' => ResourceListener::class,
            'route_name' => 'api/networking',
            'route_identifier_name' => 'network_id',
            'collection_name' => 'networking',
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
            'entity_class' => Network::class,
            'collection_class' => NetworkCollection::class,
        ],
    ],

    'zf-content-negotiation' => [
        'controllers' => [
            'Networking\Controller\NetworkController' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Networking\Controller\NetworkController' => [
                'application/hal+json',
                'application/json',
            ],
        ],
    ],

    'zf-hal' => [
        'metadata_map' => [
            NetworkCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api/networking',
                'hydrator' => Reflection::class,
                'is_collection' => true,
            ],
            Network::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api/networking',
                'route_identifier_name' => 'network_id',
                'hydrator' => Reflection::class,
                'max_depth' => 2,
            ],

        ],
    ],

    'service_manager' => [
        'factories' => [
            NetworkCollection::class => InvokableFactory::class,
            Network::class => InvokableFactory::class,
            ExporterService::class => ExporterServiceFactory::class,
            ImporterService::class => ImporterServiceFactory::class,
            ResourceListener::class => ResourceListenerFactory::class,
        ],
    ],
    'importer_manager' => [
        'factories' => [
            XingImporter::class => XingImporterFactory::class,
        ],
    ],
    'exporter_manager' => [
        'factories' => [
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
