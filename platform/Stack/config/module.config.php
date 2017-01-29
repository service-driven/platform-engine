<?php

namespace Simplicity\StackEngine;

return array(
    'service_manager' => array(
        'factories' => array(
            Docker\Service\DockerService::class => Docker\Service\DockerServiceFactory::class,
        ),
    ),

    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);