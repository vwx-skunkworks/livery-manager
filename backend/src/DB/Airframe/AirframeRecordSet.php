<?php
declare(strict_types=1);

namespace LiveryManager\DB\Airframe;

use Atlas\Mapper\RecordSet;

/**
 * @method AirframeRecord offsetGet($offset)
 * @method AirframeRecord appendNew(array $fields = [])
 * @method AirframeRecord|null getOneBy(array $whereEquals)
 * @method AirframeRecordSet getAllBy(array $whereEquals)
 * @method AirframeRecord|null detachOneBy(array $whereEquals)
 * @method AirframeRecordSet detachAllBy(array $whereEquals)
 * @method AirframeRecordSet detachAll()
 * @method AirframeRecordSet detachDeleted()
 */
class AirframeRecordSet extends RecordSet
{
}
