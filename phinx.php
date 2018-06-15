<?php

// https://siipo.la/blog/how-to-use-eloquent-orm-migrations-outside-laravel

require 'config.php';
return [
    'paths' => [
        'migrations' => 'src/database/migrations',
        'seeds' => 'src/database/Seeds'
    ],
    'migration_base_class' => 'Src\Phinx\Migrations\Migration',

    'templates'=>[
        
        'file'=> 'src/Phinx/Migrations/Migration.Stub.php.dist'
             ],

    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_database' => 'dev',
        'dev' => [
            'adapter' => DB_DRIVER,
            'host' => DB_HOST,
            'name' => DB_NAME,
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'port' => DB_PORT
        ]
    ]
];