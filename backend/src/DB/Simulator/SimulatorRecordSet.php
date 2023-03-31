<?php
declare(strict_types=1);

namespace LiveryManager\DB\Simulator;

use Atlas\Mapper\RecordSet;

/**
 * @method SimulatorRecord offsetGet($offset)
 * @method SimulatorRecord appendNew(array $fields = [])
 * @method SimulatorRecord|null getOneBy(array $whereEquals)
 * @method SimulatorRecordSet getAllBy(array $whereEquals)
 * @method SimulatorRecord|null detachOneBy(array $whereEquals)
 * @method SimulatorRecordSet detachAllBy(array $whereEquals)
 * @method SimulatorRecordSet detachAll()
 * @method SimulatorRecordSet detachDeleted()
 */
class SimulatorRecordSet extends RecordSet
{
}
