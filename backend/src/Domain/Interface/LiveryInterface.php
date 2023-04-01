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

use DateTimeInterface;
use LiveryManager\Domain\Airframe;
use LiveryManager\Domain\LiveryType;

interface LiveryInterface
{
    public function getId(): int;
    public function getAirframe(): Airframe;
    public function getLiveryType(): LiveryType;
    public function getName(): string;
    public function getTailNumber(): string;
    public function getStoragePath(): string;
    public function getDescription(): string;
    public function getEnabled(): bool;
    public function getCreatedAt(): DateTimeInterface;
}
