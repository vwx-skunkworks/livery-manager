<?php
declare(strict_types=1);

namespace LiveryManager\DB\Developer;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method DeveloperTable getTable()
 * @method DeveloperRelationships getRelationships()
 * @method DeveloperRecord|null fetchRecord($primaryVal, array $with = [])
 * @method DeveloperRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method DeveloperRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method DeveloperRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method DeveloperRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method DeveloperRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method DeveloperSelect select(array $whereEquals = [])
 * @method DeveloperRecord newRecord(array $fields = [])
 * @method DeveloperRecord[] newRecords(array $fieldSets)
 * @method DeveloperRecordSet newRecordSet(array $records = [])
 * @method DeveloperRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method DeveloperRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Developer extends Mapper
{
}
