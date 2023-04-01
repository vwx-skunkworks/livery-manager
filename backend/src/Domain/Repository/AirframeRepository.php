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
use LiveryManager\DB\Airframe\Airframe as Mapper;
use LiveryManager\DB\Airframe\AirframeRecord;
use LiveryManager\Domain\Airframe;

class AirframeRepository
{
    public function __construct(private readonly Mapper $mapper) {}

    public function fetch(int $id): Airframe
    {
        if(!$record = $this->mapper->fetchRecord($id, ['operation', 'developer', 'simulator']))
        {
            throw new DomainException('Invalid ID: ' .$id);
        }

        return static::new($record);
    }

    public static function new(AirframeRecord $record): Airframe
    {
        return new Airframe(
            $record->id,
            ($record->operation) ? OperationRepository::new($record->operation) : null,
            ($record->developer) ? DeveloperRepository::new($record->developer) : null,
            ($record->simulator) ? SimulatorRepository::new($record->simulator) : null,
            $record->name,
            $record->icao,
            $record->description,
            $record->enabled,
            $record->created_at
        );
    }
}
