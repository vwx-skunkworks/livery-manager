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
use LiveryManager\Domain\Interface\LiveryTypeInterface;

// TODO: add liveries array
class LiveryType implements LiveryTypeInterface, JsonSerializable
{
    public function __construct(
        private readonly ?int $id,
        private readonly string $name,
        private readonly string $description,
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function jsonSerialize(): array
    {
        return ['id' => $this->getId(), 'name' => $this->getName(), 'description' => $this->getDescription(), 'createdAt' => $this->getCreatedAt()];
    }
}
