<?php

use Application\Service\ApplicationNavigation;
use Application\Service\ApplicationNavigationFactory;
use Application\Service\MetaNavigation;
use Application\Service\MetaNavigationFactory;
use Application\Service\PrimaryNavigation;
use Application\Service\PrimaryNavigationFactory;
use Application\Service\UserNavigation;
use Application\Service\UserNavigationFactory;

return [
    'navigation' => [
        'applications' => [
            [
                'label' => 'Kalender',
                'route' => 'calendars',
                'icon' => 'zmdi zmdi-calendar',
                'description' => 'Sorem ipsum dolor sit amet',
                'buttons' => [
                    [
                        'label' => 'Öffnen',
                        'icon' => 'btn palette-Grey bg waves-effect',
                    ],
                ],
            ],
            [
                'label' => 'Nachrichten',
                'route' => 'messages',
                'icon' => 'bg zmdi zmdi-email',
                'description' => 'Sorem ipsum dolor sit amet',
                'buttons' => [
                    [
                        'label' => 'Öffnen',
                        'icon' => 'btn palette-Grey bg waves-effect',
                    ],
                ],
            ],
            [
                'label' => 'Dateien',
                'route' => 'calendars',
                'icon' => 'bg zmdi zmdi-file-text',
                'description' => 'Sorem ipsum dolor sit amet',
                'buttons' => [
                    [
                        'label' => 'Öffnen',
                        'icon' => 'btn palette-Grey bg waves-effect',
                    ],
                ],
            ],
            [
                'label' => 'Analytics',
                'route' => 'analyses',
                'icon' => 'zmdi zmdi-trending-up',
                'description' => 'Sorem ipsum',
                'buttons' => [
                    [
                        'label' => 'Aktualisieren',
                        'icon' => 'btn palette-Blue bg waves-effect',
                    ],
                ],
            ],
        ],
        'meta' => [
            [
                'label' => '<img src="/img/profile-pics/1.jpg" alt="">',
                'route' => 'home',
                'pages' => [
                    [
                        'label' => 'Dein Profil',
                        'route' => 'home',
                        'icon' => 'zmdi zmdi-account',
                    ],
                    [
                        'label' => 'Privatsphäre',
                        'route' => 'home',
                        'icon' => 'zmdi zmdi-input-antenna',
                    ],
                    [
                        'label' => 'Einstellungen',
                        'route' => 'home',
                        'icon' => 'zmdi zmdi-settings',
                    ],
                    [
                        'label' => 'Logout',
                        'route' => 'home',
                        'icon' => 'zmdi zmdi-time-restore',
                    ],
                ],
            ],
            [
                'label' => '<b>650</b>',
                'route' => 'home',
            ]
        ],
        'primary' => [
            [
                'label' => 'Visionen',
                'route' => 'goals',
                'icon' => 'zmdi zmdi-cloud-outline zmdi-hc-fw',
                'pages' => [
                    [
                        'label' => 'Ziele',
                        'route' => 'goals',
                    ],
                    [
                        'label' => 'Strategien',
                        'route' => 'strategies',
                    ],
                    [
                        'label' => 'Vorgänge',
                        'route' => 'issues',
                    ],
                ],
            ],
            [
                'label' => 'Verbindungen',
                'route' => 'networking',
                'icon' => 'zmdi zmdi-accounts zmdi-hc-fw',
                'pages' => [
//                    [
//                        'label' => 'Vernetzungen',
//                        'route' => 'networking',
//                    ],
                    [
                        'label' => 'Cluster',
                        'route' => 'clusters',
                        'pages' => [
                            [
                                'label' => 'Cluster-Landkarte',
                                'route' => 'networking',
                            ],
                            [
                                'label' => '',
                                'route' => 'networking',
                            ],
                            [
                                'label' => '',
                                'route' => 'networking',
                            ],
                            [
                                'label' => '',
                                'route' => 'networking',
                            ],
                            [
                                'label' => '',
                                'route' => 'networking',
                            ],
                            [
                                'label' => '',
                                'route' => 'networking',
                            ],
                            [
                                'label' => '',
                                'route' => 'networking',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Portale',
                        'route' => 'portals',
                        'pages' => [
                            [
                                'label' => 'Landesportal',
                                'route' => 'networking',
                            ],
                            [
                                'label' => 'Beteilligungsportal',
                                'route' => 'networking',
                            ],
                            [
                                'label' => 'Geoportal BW',
                                'route' => 'networking',
                            ],
                            [
                                'label' => 'Behördenfinder Deutschland (OpenCMS)',
                                'route' => 'networking',
                            ],
                            [
                                'label' => 'Energiewende? Machen wir!',
                                'route' => 'networking',
                            ],
                            [
                                'label' => 'GovData - Datenportal für Deutschland',
                                'route' => 'networking',
                            ],
                            [
                                'label' => 'Shop (OXID)',
                                'route' => 'networking',
                            ],
                            [
                                'label' => 'TYPO3',
                                'route' => 'networking',
                            ],
                        ],
                    ],
                    [
                        'label' => 'Personen',
                        'route' => 'people',
                        'pages' => [
                            [
                                'label' => 'Query-Explorer',
                                'route' => 'people',
                            ],
                            [
                                'label' => 'Importieren',
                                'route' => 'people',
                            ],
                            [
                                'label' => 'Exportieren',
                                'route' => 'people',
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => 'Daten',
                'route' => 'data',
                'icon' => 'zmdi zmdi-storage zmdi-hc-fw',
                'pages' => [
                    [
                        'label' => 'Übersicht',
                        'route' => 'data',
                    ],
                    [
                        'label' => 'Konkurrenz',
                        'route' => 'competitors',
                    ],
                    [
                        'label' => 'Berichte',
                        'route' => 'reports',
                    ],
                ],
            ],
//            [
//                'label' => 'Administration',
//                'route' => 'data',
//                'icon' => 'zmdi zmdi-settings zmdi-hc-fw',
//                'pages' => [
//                    [
//                        'label' => 'Importer',
//                        'route' => 'importers',
//                    ],
//                    [
//                        'label' => 'Exporter',
//                        'route' => 'exporters',
//                    ],
//                    [
//                        'label' => 'Datentypen',
//                        'route' => 'data',
//                        'pages' => [
//                            [
//                                'label' => 'Videos',
//                                'route' => 'data',
//                            ],
//                            [
//                                'label' => 'Kurse',
//                                'route' => 'data',
//                            ],
//                            [
//                                'label' => 'Podcast',
//                                'route' => 'data',
//                            ],
//                            [
//                                'label' => 'Hörbuch',
//                                'route' => 'data',
//                            ],
//                            [
//                                'label' => 'Lexikon',
//                                'route' => 'data',
//                            ],
//                            [
//                                'label' => 'FAQ',
//                                'route' => 'data',
//                            ],
//                            [
//                                'label' => 'Buch',
//                                'route' => 'data',
//                            ],
//                            [
//                                'label' => 'Newsletter',
//                                'route' => 'data',
//                            ],
//                        ],
//                    ],
//                    [
//                        'label' => 'Datenquellen',
//                        'route' => 'data',
//                        'pages' => [
//                            [
//                                'label' => 'Foren',
//                                'route' => 'data',
//                            ],
//                        ],
//                    ],
//                ],
//            ],
        ],
        'user' => [
            [
                'label' => 'User',
                'route' => 'user'
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            ApplicationNavigation::class => ApplicationNavigationFactory::class,
            MetaNavigation::class => MetaNavigationFactory::class,
            PrimaryNavigation::class => PrimaryNavigationFactory::class,
            UserNavigation::class => UserNavigationFactory::class,
        ],
    ],
    'rabbitmq' => [
        'host' => 'localhost',
        'port' => 5672,
        'login' => 'guest',
        'password' => 'guest',
    ],
];
