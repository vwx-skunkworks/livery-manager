<?php
/**
 * .
 *
 *     Flight Sim Livery Manager
 *     Copyright (c) 2023  VWX Systems
 *
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU Lesser General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or any later version.
 *
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 */

declare(strict_types=1);

use Monolog\Level;
use VatRadar\Env\Env;

// Application default settings

// Ensure environment variables are loaded
Env::init(__DIR__ . '/../');

// Error reporting
error_reporting(0);
ini_set('display_errors', '0');
ini_set('display_startup_errors', '0');

// Timezone
date_default_timezone_set('Etc/UTC');

$settings = [];

// Error handler
$settings['error'] = [
    // Should be set to false for the production environment
    'display_error_details' => false,
    // Should be set to false for the test environment
    'log_errors' => true,
    // Display error details in error log
    'log_error_details' => true,
];

// Logger settings
$settings['logger'] = [
    // Log file location
    'path' => __DIR__ . '/../logs',
    // Default log level
    'level' => Level::Info,
];

// Default DB settings
$settings['atlas'] = [
    'namespace' => 'LiveryManager\DB',
    'directory' => __DIR__ . '/../src/DB',
     'pdo' => [
         'mysql:dbname=' . Env::get('DB_DATABASE') . ';host=' . Env::get('DB_HOST'),
         Env::get('DB_USER'),
         Env::get('DB_PASS'),
    ],
];

return $settings;
