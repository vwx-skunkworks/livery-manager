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

use DomainException;
use Exception;
use Fig\Http\Message\StatusCodeInterface;
use JsonException;
use LiveryManager\Exception\DbInsertException;
use LiveryManager\Exception\DbUpdateException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

use function json_decode;

use function strtoupper;

use const JSON_THROW_ON_ERROR;

abstract class ActionCommon
{

    /**
     * @throws Exception
     */
    public function fetch(ResponseInterface $response, mixed $id): ResponseInterface
    {
        try {
            $record = $this->repository->fetch(strtoupper($id));
        } catch (DomainException $e) {
            $response = $response->withStatus(StatusCodeInterface::STATUS_NOT_FOUND);
            $record = ['message' => $e->getMessage()];
        }

        return $this->renderer->json($response, $record);
    }

    public function fetchAll(ResponseInterface $response): ResponseInterface
    {
        $data = $this->repository->fetchAll();

        return $this->renderer->json($response, $data);
    }

    /**
     * @throws JsonException
     * @throws DbInsertException
     */
    public function create(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $body = json_decode((string) $request->getBody(), true, 512, JSON_THROW_ON_ERROR);

        $data = ['id' => $this->repository->create($body)];

        return $this->renderer->json($response->withStatus(StatusCodeInterface::STATUS_CREATED), $data);
    }

    /**
     * @throws JsonException
     * @throws DbUpdateException
     */
    public function update(ServerRequestInterface $request, ResponseInterface $response, mixed $id): ResponseInterface
    {
        $body = json_decode((string) $request->getBody(), true, 512, JSON_THROW_ON_ERROR);

        $record = [];
        try {
            $this->repository->update(strtoupper($id), $body);
            $response = $response->withStatus(StatusCodeInterface::STATUS_ACCEPTED);
        } catch (DomainException $e) {
            $response = $response->withStatus(StatusCodeInterface::STATUS_NOT_FOUND);
            $record = ['message' => $e->getMessage()];
        }
        return $this->renderer->json($response, $record);
    }

    public function delete(ResponseInterface $response, mixed $id): ResponseInterface
    {
        $record = [];
        try {
            $this->repository->delete(strtoupper($id));
            $response = $response->withStatus(StatusCodeInterface::STATUS_ACCEPTED);
        } catch (DomainException $e) {
            $response = $response->withStatus(StatusCodeInterface::STATUS_NOT_FOUND);
            $record = ['message' => $e->getMessage()];
        }

        return $this->renderer->json($response, $record);
    }

}
