<?php
return [
    'determineRouteBeforeAppMiddleware' => false,
    'outputBuffering' => false,
    'displayErrorDetails' => true,
    'db' => [
        'driver' => 'pgsql',
        'host' => '127.0.0.1',
        'port' => 5432,
        'database' => 'postgres',
        'username' => 'homestead',
        'password' => 'secret',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
    ]
];