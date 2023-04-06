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
use LiveryManager\Domain\Interface\CreatedAtInterface;
use LiveryManager\Domain\Interface\LiveryTypeInterface;
use Odan\Tsid\Tsid;

// TODO: add liveries array
class LiveryType implements LiveryTypeInterface, CreatedAtInterface, JsonSerializable
{
    use IdentifierTrait;
    use CreatedAtTrait;

    public function __construct(
        private readonly Tsid $uid,
        public string $name,
        public string $description,
        private readonly DateTimeInterface $createdAt,
    ) {
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

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'createdAt' => $this->getCreatedAt()
        ];
    }
}
