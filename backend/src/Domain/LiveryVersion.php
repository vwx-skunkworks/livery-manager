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
use LiveryManager\Domain\Interface\LiveryVersionInterface;
use Odan\Tsid\Tsid;

class LiveryVersion implements LiveryVersionInterface, CreatedAtInterface, JsonSerializable
{
    use IdentifierTrait;
    use CreatedAtTrait;

    public function __construct(
        private readonly Tsid $uid,
        private readonly ?Livery $livery,
        private readonly string $version,
        public string $fileName,
        public string $changelog,
        public bool $enabled,
        private readonly DateTimeInterface $createdAt
    ) {
    }

    public function getLivery(): ?Livery
    {
        return $this->livery;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getFileName(): string
    {
        return $this->fileName;
    }

    public function setFileName(string $name): LiveryVersionInterface
    {
        $this->fileName = $name;
        return $this;
    }

    public function getChangelog(): string
    {
        return $this->changelog;
    }

    public function setChangelog(string $text): LiveryVersionInterface
    {
        $this->changelog = $text;
        return $this;
    }

    public function getEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): LiveryVersionInterface
    {
        $this->enabled = $enabled;
        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->getId(),
            'livery' => $this->getLivery(),
            'version' => $this->getVersion(),
            'changelog' => $this->getChangelog(),
            'fileName' => $this->getFileName(),
            'enabled' => $this->getEnabled(),
            'createdAt' => $this->getCreatedAt()
        ];
    }
}
