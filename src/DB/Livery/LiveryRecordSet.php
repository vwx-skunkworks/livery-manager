<?php

declare(strict_types=1);

namespace LiveryManager\DB\Livery;

use Atlas\Mapper\RecordSet;

/**
 * @method LiveryRecord offsetGet($offset)
 * @method LiveryRecord appendNew(array $fields = [])
 * @method LiveryRecord|null getOneBy(array $whereEquals)
 * @method LiveryRecordSet getAllBy(array $whereEquals)
 * @method LiveryRecord|null detachOneBy(array $whereEquals)
 * @method LiveryRecordSet detachAllBy(array $whereEquals)
 * @method LiveryRecordSet detachAll()
 * @method LiveryRecordSet detachDeleted()
 */
class LiveryRecordSet extends RecordSet
{
}
