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
use LiveryManager\DB\LiveryVersion\LiveryVersion as Mapper;
use LiveryManager\DB\LiveryVersion\LiveryVersionRecord;
use LiveryManager\Domain\LiveryVersion;

class LiveryVersionRepository
{

    public function __construct(private readonly Mapper $mapper) {}

    public function fetch(int $id): LiveryVersion
    {
        if(!$record = $this->mapper->fetchRecord($id, ['livery']))
        {
            throw new DomainException('Invalid ID: ' .$id);
        }

        return static::new($record);
    }

    public static function new(LiveryVersionRecord $record): LiveryVersion
    {
        return new LiveryVersion(
            $record->id,
            ($record->livery) ? LiveryRepository::new($record->livery) : null,
            $record->version,
            $record->changelog,
            $record->file_name,
            $record->enabled,
            $record->created_at
        );
    }
}
