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

namespace LiveryManager\Handler;

use Atlas\Table\Exception as AtlasTableException;
use DomainException;
use Fig\Http\Message\StatusCodeInterface;
use InvalidArgumentException;
use LiveryManager\Factory\LoggerFactory;
use LiveryManager\Renderer\JsonRenderer;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Slim\Exception\HttpException;
use Slim\Interfaces\ErrorHandlerInterface;
use Throwable;

final class DefaultErrorHandler implements ErrorHandlerInterface
{
    private JsonRenderer $jsonRenderer;

    private ResponseFactoryInterface $responseFactory;

    private LoggerInterface $logger;

    public function __construct(
        JsonRenderer $jsonRenderer,
        ResponseFactoryInterface $responseFactory,
        LoggerFactory $loggerFactory
    ) {
        $this->jsonRenderer = $jsonRenderer;
        $this->responseFactory = $responseFactory;
        $this->logger = $loggerFactory
            ->addFileHandler('error.log')
            ->createLogger();
    }


    public function __invoke(
        ServerRequestInterface $request,
        Throwable $exception,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails
    ): ResponseInterface {
        // Log error
        if ($logErrors) {
            $error = $this->getErrorDetails($exception, $logErrorDetails);
            $error['method'] = $request->getMethod();
            $error['url'] = (string)$request->getUri();

            $this->logger->error($exception->getMessage(), $error);
        }

        $response = $this->responseFactory->createResponse();

        $response = $response->withStatus($this->getHttpStatusCode($exception));
        // Render response
        return $this->jsonRenderer->json($response, [
            'error' => $this->getErrorDetails($exception, $displayErrorDetails),
        ]);
    }

    private function getHttpStatusCode(Throwable $exception): int
    {
        // Detect status code
        $statusCode = StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR;

        if ($exception instanceof HttpException) {
            $statusCode = (int)$exception->getCode();
        }

        if ($exception instanceof DomainException || $exception instanceof InvalidArgumentException) {
            // Bad request
            $statusCode = StatusCodeInterface::STATUS_BAD_REQUEST;
        }

        if($exception instanceof AtlasTableException) {
            $statusCode = StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR;
        }

        $file = basename($exception->getFile());
        if ($file === 'CallableResolver.php') {
            $statusCode = StatusCodeInterface::STATUS_NOT_FOUND;
        }

        return $statusCode;
    }

    private function getErrorDetails(Throwable $exception, bool $displayErrorDetails): array
    {
        if ($displayErrorDetails === true) {
            return [
                'message' => $exception->getMessage(),
                'code' => $exception->getCode(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'previous' => $exception->getPrevious(),
                'trace' => $exception->getTrace(),
            ];
        }

        return [
            'message' => $exception->getMessage(),
        ];
    }
}
