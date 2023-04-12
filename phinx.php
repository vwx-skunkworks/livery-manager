<?php

use VatRadar\Env\Env;

Env::init(__DIR__);

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => Env::get('DB_ENVIRONMENT'),
        Env::get('DB_ENVIRONMENT') => [
            'adapter' => 'mysql',
            'host' => Env::get('DB_HOST'),
            'name' => Env::get('DB_DATABASE'),
            'user' => Env::get('DB_USER'),
            'pass' => Env::get('DB_PASS'),
            'port' => '3306',
            'charset' => 'utf8',
        ],
    ],
    'version_order' => 'creation',
    'schema_file' => '%%PHINX_CONFIG_DIR%%/db/schema.php',
    'foreign_keys' => true,
    'mark_generated_migration' => true,

];
