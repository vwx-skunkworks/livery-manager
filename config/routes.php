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

use LiveryManager\Action\Api\AirframeAction;
use LiveryManager\Action\Changelog\ChangelogAction;
use LiveryManager\Action\Api\DeveloperAction;
use LiveryManager\Action\Api\LiveryAction;
use LiveryManager\Action\Api\LiveryTypeAction;
use LiveryManager\Action\Api\LiveryVersionAction;
use LiveryManager\Action\Api\OperationAction;
use LiveryManager\Action\Api\SimulatorAction;
use LiveryManager\Action\Faq\FaqAction;
use LiveryManager\Action\Home\HomeAction;
use LiveryManager\Action\Settings\SettingsAction;
use LiveryManager\Action\Storage\StorageAction;
use Slim\App;
use Slim\Routing\RouteCollectorProxy;

return static function (App $app) {
    $app->get('/', HomeAction::class)->setName('home');

    $app->group(
        '/settings',
    function(RouteCollectorProxy $app) {
            SettingsAction::registerRoutes($app);
        });

    $app->group(
        '/changelog',
        function(RouteCollectorProxy $app) {
            ChangelogAction::registerRoutes($app);
        });

    $app->group(
        '/storage',
        function(RouteCollectorProxy $app) {
            StorageAction::registerRoutes($app);
        });

    $app->group(
        '/faq',
        function(RouteCollectorProxy $app) {
            FaqAction::registerRoutes($app);
        });

    $app->group(
        '/api',
        function (RouteCollectorProxy $app) {
            AirframeAction::registerRoutes($app);
            DeveloperAction::registerRoutes($app);
            LiveryAction::registerRoutes($app);
            LiveryTypeAction::registerRoutes($app);
            LiveryVersionAction::registerRoutes($app);
            OperationAction::registerRoutes($app);
            SimulatorAction::registerRoutes($app);
        }
    );

};
