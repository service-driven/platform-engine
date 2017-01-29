<?php

return [
    'modules' => require __DIR__ . '/modules.config.php',

    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],
        'config_cache_enabled' => true,
        'config_cache_key' => 'application.config.cache',
        'module_map_cache_enabled' => true,
        'module_map_cache_key' => 'application.module.cache',
        'cache_dir' => 'data/cache/',
        'check_dependencies' => true,
    ],

    'service_listener_options' => [
//        [
//            'service_manager' => ImporterManager::class,
//            'interface' => 'Application\ServiceManager\Plugin\ImporterInterface',
//            'config_key' => 'importer_manager',
//            'method' => 'getImporterManager',
//        ],
//        [
//            'service_manager' => ExporterManager::class,
//            'interface' => 'Application\ServiceManager\Plugin\ExporterInterface',
//            'config_key' => 'exporter_manager',
//            'method' => 'getExporterManager',
//        ],
//        [
//            'service_manager' => NodeManager::class,
//            'interface' => 'Node\ServiceManager\Plugin\NodeInterface',
//            'config_key' => 'node_manager',
//            'method' => 'getNodes',
//        ],
    ],
];
