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
use Dflydev\Base32\Crockford\Crockford;
use DomainException;
use LiveryManager\Exception\DbInsertException;
use LiveryManager\Exception\DbUpdateException;
use Odan\Tsid\Tsid;
use Odan\Tsid\TsidFactory;
use Psr\Log\LoggerInterface;
use Throwable;

use function array_filter;
use function in_array;
use function strtolower;

use const ARRAY_FILTER_USE_KEY;

abstract class RepositoryCommon
{

    public function __construct(
        protected readonly Atlas $db,
        protected readonly TsidFactory $uid,
        protected readonly LoggerInterface $logger
    )
    {}

    abstract protected function fromRecord(Record $record): object;

    protected function tsid(int $id): Tsid
    {
        return new Tsid($id);
    }

    protected function uidConvert(string $uid): string
    {
        return (string) Crockford::decode($uid);
    }


    protected function filter(array $data, array $fields): array
    {
        return array_filter($data, static function($key) use ($fields) {
            if(!in_array($key, $fields, true)) {
                return false;
            }
            return true;
        }, ARRAY_FILTER_USE_KEY);
    }

    /**
     * @param class-string $class
     */
    protected function baseFetchAll(string $class): array
    {
        return $this->db->select($class)->fetchRecords();
    }

    /**
     * @param class-string $class
     * @throws DomainException
     */
    protected function baseFetch(string $class, int|string $uid): Record
    {
        $id = $this->uidConvert($uid);

        if (!$record = $this->db->fetchRecord($class, $id)) {
            throw new DomainException('Invalid ID: ' . $uid, 404);
        }

        return $record;
    }

    /**
     * @param class-string $class
     * @throws DbInsertException
     */
    protected function baseCreate(string $class, array $data): string|int
    {
        $new  = $this->db->newRecord($class, $data);
        $tsid = $this->uid->generate();
        $new->id = $tsid->toInt();

        try {
            $this->db->insert($new);
        } catch (Throwable $e) {
            throw new DbInsertException('Error Persisting Data', 500, $e);
        }

        return $tsid->toString();
    }

    /**
     * @param class-string $class
     * @throws DbUpdateException
     */
    protected function baseUpdate(string $class, int|string $uid, array $data): bool
    {
        $record = $this->baseFetch($class, $uid);

        foreach($data as $k => $v)
        {
            switch(strtolower($k)) {
                case 'id':
                case 'createdat':
                    break;
                default:
                    $record->{$k} = $v;
            }
        }

        try {
            $this->db->update($record);
        } catch (Throwable $e) {
            throw new DbUpdateException('Error Persisting Data', 500, $e);
        }

        return true;
    }

    /**
     * @param class-string $class
     */
    protected function baseDelete(string $class, int|string $uid): bool
    {
        $record = $this->baseFetch($class, $uid);

        $this->db->delete($record);

        return true;
    }
}
