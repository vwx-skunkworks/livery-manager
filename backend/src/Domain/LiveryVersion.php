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

namespace LiveryManager\Domain;

use DateTimeInterface;
use LiveryManager\Domain\Interface\LiveryVersionInterface;

class LiveryVersion implements LiveryVersionInterface
{
    public function __construct(
        private readonly int $id,
        private readonly ?Livery $livery,
        private readonly int $version,
        private readonly string $changelog,
        private readonly string $fileName,
        private readonly bool $enabled,
        private readonly DateTimeInterface $createdAt
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getLivery(): ?Livery
    {
        return $this->livery;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function getChangelog(): string
    {
        return $this->changelog;
    }
    
    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }
}
