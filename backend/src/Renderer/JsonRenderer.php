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

namespace LiveryManager\Renderer;

use Psr\Http\Message\ResponseInterface;

use function json_encode;

use const JSON_THROW_ON_ERROR;

final class JsonRenderer
{
    public function json(
        ResponseInterface $response,
        mixed $data = null,
        int $options =  JSON_UNESCAPED_SLASHES | JSON_PARTIAL_OUTPUT_ON_ERROR | JSON_THROW_ON_ERROR
    ): ResponseInterface {
        $response = $response->withHeader('Content-Type', 'application/json');
        $response->getBody()->write((string)json_encode($data, $options));

        return $response;
    }
}
