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

use DateTimeImmutable;
use DateTimeInterface;
use JsonSerializable;
use LiveryManager\Domain\Interface\AirframeInterface;
use LiveryManager\Domain\Interface\CreatedAtInterface;
use Odan\Tsid\Tsid;
use Odan\Tsid\TsidFactory;

class Airframe implements AirframeInterface, CreatedAtInterface, JsonSerializable
{
    use IdentifierTrait;
    use CreatedAtTrait;

    public function __construct(
        protected string $name,
        protected string $icao,
        protected ?string $description,
        private ?Tsid $uid = null,
        private ?DateTimeInterface $createdAt = null,
        protected ?Operation $operation = null,
        protected ?Developer $developer = null,
        protected ?Simulator $simulator = null,
        protected bool $enabled = true
    ) {
        if(!$this->uid) {
            $this->uid = (new TsidFactory())->generate();
        }
        if(!$this->createdAt) {
            $this->createdAt = new DateTimeImmutable();
        }
    }

    public function getOperation(): ?Operation
    {
        return $this->operation;
    }

    public function setOperation(Operation $operation): self
    {
        $this->operation = $operation;
        return $this;
    }

    public function getDeveloper(): ?Developer
    {
        return $this->developer;
    }

    public function setDeveloper(Developer $developer): self
    {
        $this->developer = $developer;
        return $this;
    }

    public function getSimulator(): ?Simulator
    {
        return $this->simulator;
    }

    public function setSimulator(Simulator $simulator): self
    {
        $this->simulator = $simulator;
        return $this;
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
