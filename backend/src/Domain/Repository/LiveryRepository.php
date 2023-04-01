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
use LiveryManager\DB\Livery\Livery as Mapper;
use LiveryManager\DB\Livery\LiveryRecord;
use LiveryManager\Domain\Livery;

class LiveryRepository
{
    public function __construct(private readonly Mapper $mapper) {}

    public function fetch(int $id): Livery
    {
        if(!$record = $this->mapper->fetchRecord($id, ['airframe', 'livery_type', 'developer', 'simulator']))
        {
            throw new DomainException('Invalid ID: ' .$id);
        }

        return static::new($record);
    }

    public static function new(LiveryRecord $record): Livery
    {
        return new Livery(
            $record->id,
            ($record->airframe) ? AirframeRepository::new($record->airframe) : null,
            ($record->livery_type) ? LiveryTypeRepository::new($record->livery_type) : null,
            $record->name,
            $record->tailno,
            $record->storage_path,
            $record->description,
            $record->enabled,
            $record->created_at
        );
    }
}
