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

namespace LiveryManager\Action\Changelog;

use LiveryManager\Domain\Repository\LiveryVersionRepository;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteCollectorProxy;
use Slim\Views\Twig;

class ChangelogAction
{
    public function __construct(
        protected readonly LiveryVersionRepository $repository,
    ) {}

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $rec = $this->repository->fetchAll();

        return Twig::fromRequest($request)->render(
            $response,
            'changelog.twig',
            ['records' => $rec]
        );
    }

    public static function registerRoutes(RouteCollectorProxy $app): void
    {
        $app->get('', __CLASS__);
    }
}
