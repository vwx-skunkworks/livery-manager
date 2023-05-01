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

use Atlas\Orm\Atlas;
use Atlas\Orm\AtlasBuilder;
use DI\Bridge\Slim\Bridge;
use LiveryManager\Factory\LoggerFactory;
use LiveryManager\Handler\DefaultErrorHandler;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ServerRequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Log\LoggerInterface;
use Selective\BasePath\BasePathMiddleware;
use Slim\App;
use Slim\Interfaces\RouteParserInterface;
use Slim\Middleware\ErrorMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

return [
    // App settings
    'settings' => static fn () => require __DIR__ . '/settings.php',

    'view' => function(ContainerInterface $container) {
        $s = $container->get('settings')['view'];
        return Twig::create($s['template_dir'], ['cache' => $s['cache_dir']]);
    },

    ContainerInterface::class => static function(ContainerInterface $container): ContainerInterface {
        return $container;
    },

    TwigMiddleware::class => function (ContainerInterface $container): Twig {
        $s = $container->get('settings')['view'];
        return Twig::create($s['template_dir'], ['cache' => $s['cache_dir']]);
    },

    App::class => static function (ContainerInterface $container): App {
        $app = Bridge::create($container);

        // route registration
        (require __DIR__ . '/routes.php')($app);

        // middlware registration
        (require __DIR__ . '/middleware.php')($app);

        return $app;
    },

    LoggerInterface::class => static function(ContainerInterface $container) {
       $logger = $container->get(LoggerFactory::class)
            ->addFileHandler('application.log')
            ->createLogger('lm-backend');

       return $logger;
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

    Atlas::class => static function (ContainerInterface $container): Atlas {
        $settings = $container->get('settings')['atlas']['pdo'];

        $builder = new AtlasBuilder(
            $settings[0],
            $settings[1],
            $settings[2],
        );

        $builder->setFactory(function (string $class) use ($container) {
            return $container->get($class);
        });

        return $builder->newAtlas();
    },

];
