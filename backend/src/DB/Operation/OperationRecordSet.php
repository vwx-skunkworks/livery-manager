<?php
declare(strict_types=1);

namespace LiveryManager\DB\Operation;

use Atlas\Mapper\RecordSet;

/**
 * @method OperationRecord offsetGet($offset)
 * @method OperationRecord appendNew(array $fields = [])
 * @method OperationRecord|null getOneBy(array $whereEquals)
 * @method OperationRecordSet getAllBy(array $whereEquals)
 * @method OperationRecord|null detachOneBy(array $whereEquals)
 * @method OperationRecordSet detachAllBy(array $whereEquals)
 * @method OperationRecordSet detachAll()
 * @method OperationRecordSet detachDeleted()
 */
class OperationRecordSet extends RecordSet
{
}
