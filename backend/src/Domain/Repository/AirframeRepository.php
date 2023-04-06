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
use LiveryManager\DB\Airframe\Airframe as Mapper;
use LiveryManager\Domain\Airframe;

class AirframeRepository extends RepositoryCommon
{
    protected static array $fields = ['name', 'icao', 'description', 'enabled'];
    protected static string $mapper = Mapper::class;

    public static function new(string $name, string $icao, string $description): Airframe
    {
        return new Airframe($name, $icao, $description);
    }

    /**
     * @throws Exception
     */
    protected function fromRecord(Record $record): Airframe
    {
        return new Airframe(
            $record->name,
            $record->icao,
            $record->description,
            $this->tsid($record->id),
            new DateTimeImmutable($record->created_at),
            $record->operation,
            $record->developer,
            $record->simulator,
            (bool) $record->enabled
        );
    }
}
