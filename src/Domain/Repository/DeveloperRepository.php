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
use LiveryManager\DB\Developer\Developer as Mapper;
use LiveryManager\Domain\Developer;

class DeveloperRepository extends RepositoryCommon
{
    public static array $fields = ['name'];
    public static string $mapper = Mapper::class;

    public static function new(string $name): Developer
    {
        return new Developer($name);
    }

    /**
     * @throws Exception
     */
    protected function fromRecord(Record $record): object
    {
        return new Developer(
            $record->name,
            $this->tsid($record->id),
            new DateTimeImmutable($record->created_at)
        );
    }
}
