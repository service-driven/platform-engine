<?php

namespace Simplicity\MessageQueue;

return array(
    'service_manager' => array(
        'factories' => array(
            Client\RedisClient::class => Client\RedisClientFactory::class,
        ),
    ),
);