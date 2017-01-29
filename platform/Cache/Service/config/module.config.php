<?php

namespace Simplicity\EventDrivenCache;

return array(
    'service_manager' => array(
        'factories'  => array(
            Engine\AnalyzeEngine::class => Engine\AnalyzeEngineFactory::class,
        ),
        'invokables' => array(
            Collector\EventCollector::class => Collector\EventCollector::class,
        ),
    ),

    //    'view_manager' => array(
    //        'strategies'          => array(
    //            'ViewJsonStrategy',
    //        ),
    //        'template_path_stack' => array(
    //            'zenddevelopertools' => __DIR__ . '/../view',
    //        ),
    //        'template_map'        => array(
    //            'analyze-engine/toolbar/events' => __DIR__ . '/../view/analyze-engine/toolbar/events.phtml',
    //        ),
    //    ),
    //
    //    'zenddevelopertools' => array(
    //        'profiler' => array(
    //            'collectors' => array(
    //                'events' => Collector\EventCollector::class,
    //            ),
    //        ),
    //        'toolbar'  => array(
    //            'entries' => array(
    //                'events' => 'analyze-engine/toolbar/events',
    //            ),
    //        ),
    //    ),
);