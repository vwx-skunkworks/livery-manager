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
use LiveryManager\DB\Operation\Operation as Mapper;
use LiveryManager\DB\Operation\OperationRecord;
use LiveryManager\Domain\Operation;

class OperationRepository
{
    public function __construct(private readonly Mapper $mapper) {}

    public function fetch(int $id): Operation
    {
       if(!$record = $this->mapper->fetchRecord($id))
       {
           throw new DomainException('Invalid ID: ' .$id);
       }

        return static::new($record);
    }

    public static function new(OperationRecord $record): Operation
    {
        return new Operation(
            $record->id,
            $record->name,
            $record->created_at
        );
    }

}
