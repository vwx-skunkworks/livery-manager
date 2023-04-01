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

namespace LiveryManager\Domain\Repository;

use DomainException;
use LiveryManager\DB\LiveryType\LiveryType as Mapper;
use LiveryManager\DB\LiveryType\LiveryTypeRecord;
use LiveryManager\Domain\LiveryType;

class LiveryTypeRepository
{
    public function __construct(private readonly Mapper $mapper) {}

    public function fetch(int $id): LiveryType
    {
        if(!$record = $this->mapper->fetchRecord($id))
        {
            throw new DomainException('Invalid ID: ' .$id);
        }

        return static::new($record);
    }

    public static function new(LiveryTypeRecord $record): LiveryType
    {
        return new LiveryType(
            $record->id,
            $record->name,
            $record->description,
            $record->created_at
        );
    }
}
