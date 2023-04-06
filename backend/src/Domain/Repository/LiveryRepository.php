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

use Atlas\Mapper\Record;
use DateTimeImmutable;
use Exception;
use LiveryManager\DB\Livery\Livery as Mapper;
use LiveryManager\Domain\Livery;

class LiveryRepository extends RepositoryCommon
{
   protected static array $fields = ['name', 'tailno', 'description', 'enabled'];
   protected static string $mapper = Mapper::class;

    public static function new(string $name, string $tailno, string $description, string $storagePath): Livery
    {
        return new Livery(
            $name,
            $tailno,
            $description,
            $storagePath
        );
    }

    /**
     * @throws Exception
     */
    protected function fromRecord(Record $record): Livery
    {
        return new Livery(
            $record->name,
            $record->tailno,
            $record->description,
            $record->storage_path,
            $this->tsid($record->id),
            new DateTimeImmutable($record->created_at),
            $record->airframe,
            $record->livery_type,
            $record->enabled,
        );
    }
}
