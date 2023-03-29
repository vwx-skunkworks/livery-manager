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

namespace LiveryManager\Factory;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Symfony\Component\Uid\Uuid;

use function str_starts_with;

final class LoggerFactory
{
    private string $path;

    private Level $level;

    private array $handler = [];

    private ?HandlerInterface $test;

    public function __construct(array $settings)
    {
        $this->path = $settings['path'] ?? 'php://output';
        $this->level = $settings['level'] ?? Level::Debug;
        $this->test = $settings['test'] ?? null;
    }

    public function createLogger(string $name = null): LoggerInterface
    {
        if ($this->test) {
            $this->handler = [$this->test];
        }

        $logger = new Logger($name ?: Uuid::v4()->toRfc4122());

        foreach ($this->handler as $handler) {
            $logger->pushHandler($handler);
        }

        $this->handler = [];

        return $logger;
    }

    public function addHandler(HandlerInterface $handler): self
    {
        $this->handler[] = $handler;

        return $this;
    }

    public function addFileHandler(string $filename, Level $level = null): self
    {
        if(str_starts_with($this->path, 'php')) {
            return $this->addConsoleHandler($level);

        }

        $filename = sprintf('%s/%s', $this->path, $filename);
        $rotatingFileHandler = new RotatingFileHandler($filename, 0, $level ?? $this->level, true, 0777);

        // The last "true" here tells monolog to remove empty []'s
        $rotatingFileHandler->setFormatter(new LineFormatter(null, null, false, true));

        $this->addHandler($rotatingFileHandler);

        return $this;
    }

    public function addConsoleHandler(Level $level = null): self
    {
        $streamHandler = new StreamHandler('php://output', $level ?? $this->level);
        $streamHandler->setFormatter(new LineFormatter(null, null, false, true));

        $this->addHandler($streamHandler);

        return $this;
    }
}
