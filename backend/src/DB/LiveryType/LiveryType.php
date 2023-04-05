<?php

declare(strict_types=1);

namespace LiveryManager\DB\LiveryType;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method LiveryTypeTable getTable()
 * @method LiveryTypeRelationships getRelationships()
 * @method LiveryTypeRecord|null fetchRecord($primaryVal, array $with = [])
 * @method LiveryTypeRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method LiveryTypeRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method LiveryTypeRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method LiveryTypeRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method LiveryTypeRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method LiveryTypeSelect select(array $whereEquals = [])
 * @method LiveryTypeRecord newRecord(array $fields = [])
 * @method LiveryTypeRecord[] newRecords(array $fieldSets)
 * @method LiveryTypeRecordSet newRecordSet(array $records = [])
 * @method LiveryTypeRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method LiveryTypeRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class LiveryType extends Mapper
{
}
