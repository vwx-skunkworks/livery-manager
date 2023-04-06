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

use LiveryManager\Action\Home\HomeAction;
use LiveryManager\Action\SimulatorAction;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return static function (App $app) {
    $app->get('/', HomeAction::class)->setName('home');

    $app->group(
        '/api',
        function (RouteCollectorProxy $app) {
            SimulatorAction::registerRoutes($app);
        }
    );

};
