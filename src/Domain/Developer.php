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
use LiveryManager\Domain\Interface\CreatedAtInterface;
use LiveryManager\Domain\Interface\DeveloperInterface;
use Odan\Tsid\Tsid;
use Odan\Tsid\TsidFactory;

class Developer implements DeveloperInterface, CreatedAtInterface, JsonSerializable
{
    use IdentifierTrait;
    use CreatedAtTrait;

    public function __construct(
        protected string $name,
        private ?Tsid $uid = null,
        private ?DateTimeInterface $createdAt = null
    ) {
        if(!$this->uid) {
            $this->uid = (new TsidFactory())->generate();
        }
        if(!$this->createdAt) {
            $this->createdAt = new DateTimeImmutable();
        }
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

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'createdAt' => $this->getCreatedAt()
        ];
    }
}
