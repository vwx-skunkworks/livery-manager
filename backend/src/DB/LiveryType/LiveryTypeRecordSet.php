<?php
declare(strict_types=1);

namespace LiveryManager\DB\LiveryType;

use Atlas\Mapper\RecordSet;

/**
 * @method LiveryTypeRecord offsetGet($offset)
 * @method LiveryTypeRecord appendNew(array $fields = [])
 * @method LiveryTypeRecord|null getOneBy(array $whereEquals)
 * @method LiveryTypeRecordSet getAllBy(array $whereEquals)
 * @method LiveryTypeRecord|null detachOneBy(array $whereEquals)
 * @method LiveryTypeRecordSet detachAllBy(array $whereEquals)
 * @method LiveryTypeRecordSet detachAll()
 * @method LiveryTypeRecordSet detachDeleted()
 */
class LiveryTypeRecordSet extends RecordSet
{
}
