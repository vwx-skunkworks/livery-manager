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

use LiveryManager\Factory\LoggerFactory;
use LiveryManager\Handler\DefaultErrorHandler;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Selective\BasePath\BasePathMiddleware;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Interfaces\RouteParserInterface;
use Slim\Middleware\ErrorMiddleware;

return [
    // App settings
    'settings' => static fn() => require __DIR__ . '/settings.php',

    App::class => static function(ContainerInterface $container): App {
        $app = AppFactory::createFromContainer($container);

        // route registration
        (require __DIR__ . '/routes.php')($app);

        // middlware registration
        (require __DIR__ . '/middleware.php')($app);

        return $app;
    },

    // The logger factory
    LoggerFactory::class => static function (ContainerInterface $container) {
        return new LoggerFactory($container->get('settings')['logger']);
    },

    // HTTP factories
    ResponseFactoryInterface::class => static function (ContainerInterface $container) {
        return $container->get(Psr17Factory::class);
    },

    ServerRequestFactoryInterface::class => static function (ContainerInterface $container) {
        return $container->get(Psr17Factory::class);
    },

    StreamFactoryInterface::class => static function (ContainerInterface $container) {
        return $container->get(Psr17Factory::class);
    },

    UploadedFileFactoryInterface::class => static function (ContainerInterface $container) {
        return $container->get(Psr17Factory::class);
    },

    UriFactoryInterface::class => static function (ContainerInterface $container) {
        return $container->get(Psr17Factory::class);
    },

    // The Slim RouterParser
    RouteParserInterface::class => static function (ContainerInterface $container) {
        return $container->get(App::class)->getRouteCollector()->getRouteParser();
    },

    BasePathMiddleware::class => static function (ContainerInterface $container) {
        return new BasePathMiddleware($container->get(App::class));
    },

    ErrorMiddleware::class => static function (ContainerInterface $container) {
        $settings = $container->get('settings')['error'];
        $app = $container->get(App::class);

        $logger = $container->get(LoggerFactory::class)
            ->addFileHandler('error.log')
            ->createLogger();

        $errorMiddleware = new ErrorMiddleware(
            $app->getCallableResolver(),
            $app->getResponseFactory(),
            (bool)$settings['display_error_details'],
            (bool)$settings['log_errors'],
            (bool)$settings['log_error_details'],
            $logger
        );

        $errorMiddleware->setDefaultErrorHandler($container->get(DefaultErrorHandler::class));

        return $errorMiddleware;
    },

];
