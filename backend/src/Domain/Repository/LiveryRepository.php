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

    public function new(string $name, string $tailno, string $storagePath, string $description, bool $enabled): Livery
    {
        return new Livery(
            $this->uid->generate(),
            null,
            null,
            $name,
            $tailno,
            $storagePath,
            $description,
            $enabled,
            new DateTimeImmutable()
        );
    }

    /**
     * @throws Exception
     */
    protected function fromRecord(Record $record): Livery
    {
        return new Livery(
            $this->tsid($record->id),
            $record->airframe,
            $record->livery_type,
            $record->name,
            $record->tailno,
            $record->storage_path,
            $record->description,
            $record->enabled,
            new DateTimeImmutable($record->created_at)
        );
    }
}
