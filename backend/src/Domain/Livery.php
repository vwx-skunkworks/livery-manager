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
use LiveryManager\Domain\Interface\LiveryInterface;
use Odan\Tsid\Tsid;

// TODO: add liveries array
class Livery implements LiveryInterface, JsonSerializable
{
    use IdentifierTrait;
    use CreatedAtTrait;

    public function __construct(
        private readonly Tsid $uid,
        private readonly ?Airframe $airframe,
        private readonly ?LiveryType $liveryType,
        public  string $name,
        public  string $tailNumber,
        private readonly string $storagePath,
        public  string $description,
        public  bool $enabled,
        private readonly DateTimeInterface $createdAt
    ) {
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

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getTailNumber(): string
    {
        return $this->tailNumber;
    }

    public function setTailNumber(string $tailNumber): self
    {
        $this->tailNumber = $tailNumber;
        return $this;
    }

    public function getStoragePath(): string
    {
        return $this->storagePath;
    }

    public function getDescription(): string
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
            'airframe' => $this->getAirframe(),
            'type' => $this->getLiveryType(),
            'name' => $this->getName(),
            'tailNumber' => $this->getTailNumber(),
            'storagePath' => $this->getStoragePath(),
            'description' => $this->getDescription(),
            'enabled' => $this->getEnabled(),
            'createdAt' => $this->getCreatedAt(),
        ];
    }
}
