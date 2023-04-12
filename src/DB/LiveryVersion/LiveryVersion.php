<?php

declare(strict_types=1);

namespace LiveryManager\DB\LiveryVersion;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method LiveryVersionTable getTable()
 * @method LiveryVersionRelationships getRelationships()
 * @method LiveryVersionRecord|null fetchRecord($primaryVal, array $with = [])
 * @method LiveryVersionRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method LiveryVersionRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method LiveryVersionRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method LiveryVersionRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method LiveryVersionRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method LiveryVersionSelect select(array $whereEquals = [])
 * @method LiveryVersionRecord newRecord(array $fields = [])
 * @method LiveryVersionRecord[] newRecords(array $fieldSets)
 * @method LiveryVersionRecordSet newRecordSet(array $records = [])
 * @method LiveryVersionRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method LiveryVersionRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class LiveryVersion extends Mapper
{
}
