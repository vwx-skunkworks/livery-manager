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
use DateTimeImmutable;
use Exception;
use LiveryManager\DB\Airframe\Airframe;
use LiveryManager\DB\Livery\Livery as Mapper;
use LiveryManager\DB\LiveryType\LiveryType;
use LiveryManager\DB\LiveryVersion\LiveryVersion;
use LiveryManager\Domain\Livery;
use Odan\Tsid\TsidFactory;
use Psr\Log\LoggerInterface;

class LiveryRepository extends RepositoryCommon
{
   protected static array $fields = ['name', 'airframe_id', 'livery_type_id', 'tailno', 'storage_path', 'description', 'enabled'];
   protected static string $mapper = Mapper::class;

   public function __construct(
       Atlas $db,
       TsidFactory $uid,
       LoggerInterface $logger,
       protected readonly AirframeRepository $airframeRepository,
       protected readonly LiveryTypeRepository $liveryTypeRepository
   ) {
       parent::__construct(
           $db,
           $uid,
           $logger
       );
   }

    public function fetch(int|string $id): Record
    {
        $rec = $this->baseFetch(static::$mapper, $id);
        $rec->airframe = $this->airframeRepository->fetch($rec->airframe_id);
        $rec->livery_type = $this->liveryTypeRepository->fetch($rec->livery_type_id);

        return $rec;
    }

    public function fetchAll(): array
    {
        $records = $this->baseFetchAll(static::$mapper);
        $recArray = [];

        foreach($records as $rec) {
            $rec->airframe = $this->airframeRepository->fetch($rec->airframe_id);
            $rec->livery_type = $this->liveryTypeRepository->fetch($rec->livery_type_id);
            $ac = $rec->getArrayCopy();
            $ac['latest'] = $this->db->select(LiveryVersion::class)
                ->where('livery_id = ', $ac['id'])
                ->orderBy('id DESC')
                ->limit(1)
                ->fetchRecord();
            if(!is_null($ac['latest'])) {
                $ac['latest'] = $ac['latest']->getArrayCopy();
            }
            $recArray[] = $ac;
        }

        return $recArray;
    }


    public static function new(string $name, string $tailno, string $description, string $storagePath): Livery
    {
        return new Livery(
            $name,
            $tailno,
            $description,
            $storagePath
        );
    }

    /**
     * @throws Exception
     */
    protected function fromRecord(Record $record): Livery
    {
        return new Livery(
            $record->name,
            $record->tailno,
            $record->description,
            $record->storage_path,
            $this->tsid($record->id),
            new DateTimeImmutable($record->created_at),
            $record->airframe,
            $record->livery_type,
            $record->enabled,
        );
    }
}
