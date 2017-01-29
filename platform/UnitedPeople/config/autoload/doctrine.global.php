<?php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOPgSql\Driver',
                'params' => [
                    'port' => 5432,
                    'charset' => 'utf8',
                ],
            ],
        ],

        'entitymanager' => [
            'orm_default' => [
                'connection' => 'orm_default',
            ],
        ],
    ],
];
