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

namespace LiveryManager\Domain\Interface;

use LiveryManager\Domain\Livery;

interface LiveryVersionInterface extends IdentifierInterface
{
    public function getLivery(): ?Livery;
    public function setLivery(Livery $livery): self;
    public function getVersion(): string;
    public function setVersion(string $version): self;
    public function getChangelog(): string;
    public function setChangelog(string $text): self;
    public function getFileName(): string;
    public function setFileName(string $name): self;
    public function getEnabled(): bool;
    public function setEnabled(bool $enabled): self;
}
