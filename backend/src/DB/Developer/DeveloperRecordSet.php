<?php
declare(strict_types=1);

namespace LiveryManager\DB\Developer;

use Atlas\Mapper\RecordSet;

/**
 * @method DeveloperRecord offsetGet($offset)
 * @method DeveloperRecord appendNew(array $fields = [])
 * @method DeveloperRecord|null getOneBy(array $whereEquals)
 * @method DeveloperRecordSet getAllBy(array $whereEquals)
 * @method DeveloperRecord|null detachOneBy(array $whereEquals)
 * @method DeveloperRecordSet detachAllBy(array $whereEquals)
 * @method DeveloperRecordSet detachAll()
 * @method DeveloperRecordSet detachDeleted()
 */
class DeveloperRecordSet extends RecordSet
{
}
