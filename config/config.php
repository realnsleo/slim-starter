<?php

// Settings for our DI Container
return [
    'db'   => [
        'database_type'    => getenv('DATABASE_TYPE'),
        'server'      => getenv('MYSQL_HOST'),
        'database_name'  => getenv('MYSQL_DB'),
        'username'  => getenv('MYSQL_USER'),
        'password'  => getenv('MYSQL_PASS'),

        // [optional]
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'port'      => 3306,

        // Check https://medoo.in/api/new for more configuration options
    ],
    'twig' => [
        'debug' => getenv('ENVIRONMENT') === 'development',
        'cache' => getenv('ENVIRONMENT') === 'development' ? false : __DIR__.'/../cache',
    ],
];