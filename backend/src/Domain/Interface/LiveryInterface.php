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

use LiveryManager\Domain\Airframe;
use LiveryManager\Domain\LiveryType;

interface LiveryInterface extends IdentifierInterface
{
    public function getAirframe(): Airframe;
    public function setAirframe(Airframe $airframe): self;
    public function getLiveryType(): LiveryType;
    public function setLiveryType(LiveryType $liveryType): self;
    public function getName(): string;
    public function setName(string $name): self;
    public function getTailNumber(): string;
    public function setTailNumber(string $tailNumber): self;
    public function getStoragePath(): string;
    public function setStoragePath(string $storagePath): self;
    public function getDescription(): string;
    public function setDescription(string $description): self;
    public function getEnabled(): bool;
    public function setEnabled(bool $enabled): self;
}
