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
use LiveryManager\DB\Simulator\Simulator as Mapper;
use LiveryManager\Domain\Simulator;

use function in_array;

class SimulatorRepository extends RepositoryCommon
{
    protected array $fields = ['name'];

    public function fetchAll(): array
    {
        return $this->baseFetchAll(Mapper::class);
    }

    /**
     * @throws Exception
     */
    public function fetch(int $id): Simulator
    {
        $record = $this->baseFetch(Mapper::class, $id);
        return $this->fromRecord($record);
    }

    public function create(array $data): int
    {
        return $this->baseCreate(
            Mapper::class,
            $this->filter($data)
        );
    }

    public function update(int $id, array $data): bool
    {
        return $this->baseUpdate(Mapper::class, $id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->baseDelete(Mapper::class, $id);
    }

    protected function filter(array $data): array
    {
        $return = [];
        foreach($data as $k => $v) {
            if(in_array($k, $this->fields, true)) {
                $return[$k] = $v;
            }
        }

        return $return;
    }

    public function new(string $name): Simulator
    {
        return new Simulator($this->uid->generate(), $name, new DateTimeImmutable());
    }

    /**
     * @throws Exception
     */
    protected function fromRecord(Record $record): Simulator
    {
        return new Simulator(
            $this->tsid($record->id),
            $record->name,
             new DateTimeImmutable($record->created_at)
        );
    }
}
