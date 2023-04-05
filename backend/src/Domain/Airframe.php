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
use LiveryManager\Domain\Interface\AirframeInterface;

class Airframe implements AirframeInterface, JsonSerializable
{
    public function __construct(
        public readonly ?int $id,
        public readonly ?Operation $operation,
        public readonly ?Developer $developer,
        public readonly ?Simulator $simulator,
        public readonly string $name,
        public readonly string $icao,
        public readonly ?string $description,
        public readonly bool $enabled,
        public readonly DateTimeInterface $createdAt
    ) {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOperation(): ?Operation
    {
        return $this->operation;
    }

    public function getDeveloper(): ?Developer
    {
        return $this->developer;
    }

    public function getSimulator(): ?Simulator
    {
        return $this->simulator;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIcao(): string
    {
        return $this->icao;
    }

    public function getDescription(): ?string
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

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'operation' => $this->getOperation(),
            'developer' => $this->getDeveloper(),
            'simulator' => $this->getSimulator(),
            'name' => $this->getName(),
            'icao' => $this->getIcao(),
            'description' => $this->getDescription(),
            'enabled' => $this->getEnabled(),
            'createdAt' => $this->getCreatedAt()
        ];
    }
}
