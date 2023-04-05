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
use Atlas\Orm\Atlas;
use DomainException;
use Odan\Tsid\Tsid;
use Odan\Tsid\TsidFactory;

abstract class RepositoryCommon
{

    public function __construct(
        protected readonly Atlas $db,
        protected readonly TsidFactory $uid
    )
    {}

    abstract protected function fromRecord(Record $record): object;
    abstract protected function filter(array $data): array;

    protected function tsid(int $id): Tsid
    {
        return new Tsid($id);
    }

    /**
     * @param class-string $class
     */
    protected function baseFetchAll(string $class): array
    {
        $records = $this->db->select($class)->fetchRecords();

        $return = [];
        foreach ($records as $record) {
            $return[] = $this->fromRecord($record);
        }
        return $return;
    }

    /**
     * @param class-string $class
     */
    protected function baseFetch(string $class, int $id): Record
    {
        if (!$record = $this->db->fetchRecord($class, $id)) {
            throw new DomainException('Invalid ID: ' . $id);
        }

        return $record;
    }

    /**
     * @param class-string $class
     */
    protected function baseCreate(string $class, array $data): int
    {
        $new = $this->db->newRecord($class, $data);
        $new->id = $this->uid->generate();
        $this->db->insert($new);

        return (int) $new->id;
    }

    /**
     * @param class-string $class
     */
    protected function baseUpdate(string $class, int $id, array $data): bool
    {
        $record = $this->baseFetch($class, $id);

        foreach($data as $k => $v)
        {
            $record->{$k} = $v;
        }

        $this->db->update($record);

        return true;
    }

    /**
     * @param class-string $class
     */
    protected function baseDelete(string $class, int $id): bool
    {
        $record = $this->baseFetch($class, $id);

        $this->db->delete($record);

        return true;
    }
}
