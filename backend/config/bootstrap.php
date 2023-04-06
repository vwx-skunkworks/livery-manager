<?php
/*
 * Copyright (c) 2023 VWX Systems
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

declare(strict_types=1);

use LiveryManager\Factory\ContainerFactory;
use Slim\App;
use VatRadar\Env\Env;

require_once __DIR__ . '/../vendor/autoload.php';

Env::init(__DIR__ . '/../');

try {
    $app = ContainerFactory::createInstance()->get(App::class);
    $app->run();
} catch (Throwable $e) {
    echo 'CRITICAL://UNABLE TO INITIALIZE APPLICATION' . PHP_EOL;
    $msg = '['.date('Y-m-d H:i:s').'] '.$e->getMessage().PHP_EOL;
    file_put_contents(__DIR__.'/../logs/bootstrap_failure.log', $msg, FILE_APPEND);
}
