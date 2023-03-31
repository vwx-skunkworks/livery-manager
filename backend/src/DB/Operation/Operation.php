<?php
declare(strict_types=1);

namespace LiveryManager\DB\Operation;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method OperationTable getTable()
 * @method OperationRelationships getRelationships()
 * @method OperationRecord|null fetchRecord($primaryVal, array $with = [])
 * @method OperationRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method OperationRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method OperationRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method OperationRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method OperationRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method OperationSelect select(array $whereEquals = [])
 * @method OperationRecord newRecord(array $fields = [])
 * @method OperationRecord[] newRecords(array $fieldSets)
 * @method OperationRecordSet newRecordSet(array $records = [])
 * @method OperationRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method OperationRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Operation extends Mapper
{
}
