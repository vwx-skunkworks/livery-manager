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
use LiveryManager\DB\Simulator\Simulator as Mapper;
use LiveryManager\DB\Simulator\SimulatorRecord;
use LiveryManager\Domain\Simulator;

class SimulatorRepository
{
    public function __construct(private readonly Mapper $mapper) {}

    public function fetch(int $id): Simulator
    {
        if(!$record = $this->mapper->fetchRecord($id))
        {
            throw new DomainException('Invalid ID: ' .$id);
        }

        return static::new($record);
    }

    public static function new(SimulatorRecord $record): Simulator
    {
        return new Simulator(
            $record->id,
            $record->name,
            $record->created_at
        );
    }
}
