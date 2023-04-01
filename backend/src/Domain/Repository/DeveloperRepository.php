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
use LiveryManager\DB\Developer\Developer as Mapper;
use LiveryManager\DB\Developer\DeveloperRecord;
use LiveryManager\Domain\Developer;

class DeveloperRepository
{
    public function __construct(private readonly Mapper $mapper) {}

    public function fetch(int $id): Developer
    {
        if(!$record = $this->mapper->fetchRecord($id, ['airframes']))
        {
            throw new DomainException('Invalid ID: ' .$id);
        }

        return static::new($record);
    }

    public static function new(DeveloperRecord $record): Developer
    {
        return new Developer(
            $record->id,
            $record->name,
            [], // TODO: fix this so it populates
            $record->created_at
        );
    }
}
