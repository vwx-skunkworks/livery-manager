<?php
declare(strict_types=1);

namespace LiveryManager\DB\Livery;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method LiveryTable getTable()
 * @method LiveryRelationships getRelationships()
 * @method LiveryRecord|null fetchRecord($primaryVal, array $with = [])
 * @method LiveryRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method LiveryRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method LiveryRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method LiveryRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method LiveryRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method LiverySelect select(array $whereEquals = [])
 * @method LiveryRecord newRecord(array $fields = [])
 * @method LiveryRecord[] newRecords(array $fieldSets)
 * @method LiveryRecordSet newRecordSet(array $records = [])
 * @method LiveryRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method LiveryRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Livery extends Mapper
{
}
