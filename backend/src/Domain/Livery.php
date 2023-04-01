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
use LiveryManager\Domain\Interface\LiveryInterface;

// TODO: add liveries array
class Livery implements LiveryInterface
{
    public function __construct(
        private readonly int $id,
        private readonly ?Airframe $airframe,
        private readonly ?LiveryType $liveryType,
        private readonly string $name,
        private readonly string $tailNumber,
        private readonly string $storagePath,
        private readonly string $description,
        private readonly bool $enabled,
        private readonly DateTimeInterface $createdAt
    ) {}

    public function getId(): int
    {
        return $this->id;
    }

    public function getAirframe(): Airframe
    {
        return $this->airframe;
    }

    public function getLiveryType(): LiveryType
    {
        return $this->liveryType;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getTailNumber(): string
    {
        return $this->tailNumber;
    }

    public function getStoragePath(): string
    {
        return $this->storagePath;
    }

    public function getDescription(): string
    {
        return $this->description;
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
