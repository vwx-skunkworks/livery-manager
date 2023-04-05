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
            $app->get('/simulators', [SimulatorAction::class, 'fetchAll']);
            $app->post('/simulators', [SimulatorAction::class, 'create']);
        }
    );




    // API
    /*
    $app->group(
        '/api',
        function (RouteCollectorProxy $app) {
            $app->get('/customers', \App\Action\Customer\CustomerFinderAction::class);
            $app->post('/customers', \App\Action\Customer\CustomerCreatorAction::class);
            $app->get('/customers/{customer_id}', \App\Action\Customer\CustomerReaderAction::class);
            $app->put('/customers/{customer_id}', \App\Action\Customer\CustomerUpdaterAction::class);
            $app->delete('/customers/{customer_id}', \App\Action\Customer\CustomerDeleterAction::class);
        }
    );
    */
};
