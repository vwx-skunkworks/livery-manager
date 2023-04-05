<?php

declare(strict_types=1);

namespace LiveryManager\DB\Simulator;

use Atlas\Mapper\Mapper;
use Atlas\Table\Row;

/**
 * @method SimulatorTable getTable()
 * @method SimulatorRelationships getRelationships()
 * @method SimulatorRecord|null fetchRecord($primaryVal, array $with = [])
 * @method SimulatorRecord|null fetchRecordBy(array $whereEquals, array $with = [])
 * @method SimulatorRecord[] fetchRecords(array $primaryVals, array $with = [])
 * @method SimulatorRecord[] fetchRecordsBy(array $whereEquals, array $with = [])
 * @method SimulatorRecordSet fetchRecordSet(array $primaryVals, array $with = [])
 * @method SimulatorRecordSet fetchRecordSetBy(array $whereEquals, array $with = [])
 * @method SimulatorSelect select(array $whereEquals = [])
 * @method SimulatorRecord newRecord(array $fields = [])
 * @method SimulatorRecord[] newRecords(array $fieldSets)
 * @method SimulatorRecordSet newRecordSet(array $records = [])
 * @method SimulatorRecord turnRowIntoRecord(Row $row, array $with = [])
 * @method SimulatorRecord[] turnRowsIntoRecords(array $rows, array $with = [])
 */
class Simulator extends Mapper
{
}
