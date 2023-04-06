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

namespace LiveryManager\Action;

use LiveryManager\Domain\Repository\SimulatorRepository;
use LiveryManager\Renderer\JsonRenderer;
use Slim\Routing\RouteCollectorProxy;

class SimulatorAction extends ActionCommon
{
    public function __construct(
        protected readonly SimulatorRepository $repository,
        protected readonly JsonRenderer $renderer
    ) {
    }

    public static function registerRoutes(RouteCollectorProxy $app): void
    {
        $app->group(
            '/simulators',
            function(RouteCollectorProxy $app) {
                $app->get('/{id}', [__CLASS__, 'fetch']);
                $app->put('/{id}', [__CLASS__, 'update']);
                $app->delete('/{id}', [__CLASS__, 'delete']);
                $app->get('[/]', [__CLASS__, 'fetchAll']);
                $app->post('[/]', [__CLASS__, 'create']);
            });
    }
}
