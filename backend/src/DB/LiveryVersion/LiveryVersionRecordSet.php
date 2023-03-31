<?php
declare(strict_types=1);

namespace LiveryManager\DB\LiveryVersion;

use Atlas\Mapper\RecordSet;

/**
 * @method LiveryVersionRecord offsetGet($offset)
 * @method LiveryVersionRecord appendNew(array $fields = [])
 * @method LiveryVersionRecord|null getOneBy(array $whereEquals)
 * @method LiveryVersionRecordSet getAllBy(array $whereEquals)
 * @method LiveryVersionRecord|null detachOneBy(array $whereEquals)
 * @method LiveryVersionRecordSet detachAllBy(array $whereEquals)
 * @method LiveryVersionRecordSet detachAll()
 * @method LiveryVersionRecordSet detachDeleted()
 */
class LiveryVersionRecordSet extends RecordSet
{
}
