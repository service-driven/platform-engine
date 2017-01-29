<?php

use Zend\Router\Http\Segment;

return [
    'router' => [
        'routes' => [
            'rest-api' => [
                'type'          => Segment::class,
                'options'       => [
                    'route' => '/rest/api',
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'architecture'  => [
                        'type'          => Segment::class,
                        'options'       => [
                            'route'    => '/architecture',
                        ],
                        'may_terminate' => true,
                        'child_routes'  => [
                            'product' => [
                                'type'    => Segment::class,
                                'options' => [
                                    'route'    => '/products[/:product_id]',
                                    'defaults' => [
                                        'controller' => 'Indent\Controller\ProductController',
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'product' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/products[/:product_id]',
                            'defaults' => [
                                'controller' => 'Indent\Controller\ProductController',
                            ],
                        ],
                    ],
                    'tray'    => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/trays[/:tray_id]',
                            'defaults' => [
                                'controller' => 'Indent\Controller\TrayController',
                            ],
                        ],
                    ],
                    'storage' => [
                        'type'          => Segment::class,
                        'options'       => [
                            'route' => '/storage',
                        ],
                        'may_terminate' => true,
                        'child_routes'  => [
                            'account'  => [
                                'type'    => Segment::class,
                                'options' => [
                                    'route'    => '/accounts[/:account_id]',
                                    'defaults' => [
                                        'controller' => 'Indent\Controller\StorageAccountController',
                                    ],
                                ],
                            ],
                            'division' => [
                                'type'    => Segment::class,
                                'options' => [
                                    'route'    => '/divisions[/:division_id]',
                                    'defaults' => [
                                        'controller' => 'Indent\Controller\StorageDivisionController',
                                    ],
                                ],
                            ],
                            'location' => [
                                'type'    => Segment::class,
                                'options' => [
                                    'route'    => '/locations[/:location_id]',
                                    'defaults' => [
                                        'controller' => 'Indent\Controller\StorageLocationController',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];