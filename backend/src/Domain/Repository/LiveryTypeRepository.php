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
use LiveryManager\DB\LiveryType\LiveryType as Mapper;
use LiveryManager\Domain\LiveryType;

class LiveryTypeRepository extends RepositoryCommon
{
    protected static array $fields = ['name', 'description'];
    protected static string $mapper = Mapper::class;


    public function new(string $name, string $description): LiveryType
    {
        return new LiveryType(
            $this->uid->generate(),
            $name,
            $description,
            new DateTimeImmutable()
        );
    }

    /**
     * @throws Exception
     */
    protected function fromRecord(Record $record): object
    {
        return new LiveryType(
            $this->tsid($record->id),
            $record->name,
            $record->description,
            new DateTimeImmutable($record->created_at)
        );
    }
}
