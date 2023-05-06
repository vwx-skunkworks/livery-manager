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
use LiveryManager\DB\Developer\Developer;
use LiveryManager\DB\Operation\Operation;
use LiveryManager\DB\Simulator\Simulator;
use LiveryManager\Domain\Airframe;

class AirframeRepository extends RepositoryCommon
{
    protected static array $fields = ['name', 'icao', 'description', 'enabled', 'operation_id', 'simulator_id', 'developer_id'];
    protected static string $mapper = Mapper::class;

    public function fetch(int|string $id): Record
    {
        $rec = $this->baseFetch(static::$mapper, $id);
        $rec->operation = $this->db->fetchRecord(Operation::class, $rec->operation_id);
        $rec->developer = $this->db->fetchRecord(Developer::class, $rec->developer_id);
        $rec->simulator = $this->db->fetchRecord(Simulator::class, $rec->simulator_id);

        return $rec;
    }

    public function fetchAll(): array
    {
        $records = $this->baseFetchAll(static::$mapper);

        foreach($records as $rec) {
            $rec->operation = $this->db->fetchRecord(Operation::class, $rec->operation_id);
            $rec->developer = $this->db->fetchRecord(Developer::class, $rec->developer_id);
            $rec->simulator = $this->db->fetchRecord(Simulator::class, $rec->simulator_id);
        }

        return $records;
    }


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
