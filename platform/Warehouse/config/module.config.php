<?php

namespace Warehouse;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [],
    ],

    'service_manager' => [
        'factories' => [
            StrategyManager\PickingStrategyManager::class        => StrategyManager\PickingStrategyManagerFactory::class,
            PickingStrategyManager\PickingStrategyManager::class => PickingStrategyManager\PickingStrategyManagerFactory::class,
        ],
    ],

    'picking_manager' => [
        'factories' => [
            PickingStrategyManager\PickingStrategy\BatchPickingStrategy::class         => InvokableFactory::class,
            PickingStrategyManager\PickingStrategy\DiscreteOrderPickingStrategy::class => InvokableFactory::class,
            PickingStrategyManager\PickingStrategy\MultiOrderPickingStrategy::class    => InvokableFactory::class,
            PickingStrategyManager\PickingStrategy\ZonePickingStrategy::class          => InvokableFactory::class,
            PickingStrategyManager\PickingStrategy\WavePickingStrategy::class          => InvokableFactory::class,
            PickingStrategyManager\PickingStrategy\ZoneBatchPickingStrategy::class     => InvokableFactory::class,
            PickingStrategyManager\PickingStrategy\ZoneWavePickingStrategy::class      => InvokableFactory::class,
            PickingStrategyManager\PickingStrategy\ZoneBatchWavePickingStrategy::class => InvokableFactory::class,
        ],
    ],

    'picking_strategies' => [
        'factories' => [
            Strategy\BatchPickingStrategy::class         => Strategy\InvokablePickingStrategyFactory::class,
            Strategy\DiscreteOrderPickingStrategy::class => Strategy\InvokablePickingStrategyFactory::class,
            Strategy\MultiOrderPickingStrategy::class    => Strategy\InvokablePickingStrategyFactory::class,
            Strategy\PiecePickingStrategy::class         => Strategy\InvokablePickingStrategyFactory::class,
            Strategy\WavePickingStrategy::class          => Strategy\InvokablePickingStrategyFactory::class,
            Strategy\ZoneBatchPickingStrategy::class     => Strategy\InvokablePickingStrategyFactory::class,
            Strategy\ZoneBatchWavePickingStrategy::class => Strategy\InvokablePickingStrategyFactory::class,
            Strategy\ZonePickingStrategy::class          => Strategy\InvokablePickingStrategyFactory::class,
            Strategy\WavePickingStrategy::class          => Strategy\InvokablePickingStrategyFactory::class,
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

];
