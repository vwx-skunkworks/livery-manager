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
use LiveryManager\Domain\Interface\CreatedAtInterface;
use Odan\Tsid\Tsid;

class Airframe implements AirframeInterface, CreatedAtInterface, JsonSerializable
{
    use IdentifierTrait;
    use CreatedAtTrait;

    public function __construct(
        private readonly Tsid $uid,
        private readonly ?Operation $operation,
        private readonly ?Developer $developer,
        private readonly ?Simulator $simulator,
        public string $name,
        public string $icao,
        public ?string $description,
        public bool $enabled,
        private readonly DateTimeInterface $createdAt
    ) {
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

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getIcao(): string
    {
        return $this->icao;
    }

    public function setIcao(string $icao): self
    {
        $this->icao = $icao;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;
        return $this;
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
