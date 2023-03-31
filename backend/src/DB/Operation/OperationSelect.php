<?php
declare(strict_types=1);

namespace LiveryManager\DB\Operation;

use Atlas\Mapper\MapperSelect;

/**
 * @method OperationRecord|null fetchRecord()
 * @method OperationRecord[] fetchRecords()
 * @method OperationRecordSet fetchRecordSet()
 */
class OperationSelect extends MapperSelect
{
}
