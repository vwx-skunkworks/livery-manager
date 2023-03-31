<?php
declare(strict_types=1);

namespace LiveryManager\DB\Airframe;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method AirframeTable getTable()
 * @method AirframeRelationships getRelationships()
 * @method AirframeRecord|null fetchRecord($primaryVal, array $with = [])
 * @method AirframeRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method AirframeRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method AirframeRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method AirframeRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method AirframeRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method AirframeSelect select(array $whereEquals = [])
 * @method AirframeRecord newRecord(array $fields = [])
 * @method AirframeRecord[] newRecords(array $fieldSets)
 * @method AirframeRecordSet newRecordSet(array $records = [])
 * @method AirframeRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method AirframeRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Airframe extends Mapper
{
}
