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
use JsonSerializable;
use LiveryManager\Domain\Interface\DeveloperInterface;

class Developer implements DeveloperInterface, JsonSerializable
{
    public function __construct(
        private readonly ?int $id,
        private readonly string $name,
        private readonly array $airframes,
        private readonly DateTimeInterface $createdAt,
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAirframes(): ?array
    {
        return $this->airframes;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function jsonSerialize(): array
    {
        return ['id' => $this->getId(), 'name' => $this->getName(), 'createdAt' => $this->getCreatedAt()];
    }
}
