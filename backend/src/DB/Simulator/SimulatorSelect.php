<?php

declare(strict_types=1);

namespace LiveryManager\DB\Simulator;

use Atlas\Mapper\MapperSelect;

/**
 * @method SimulatorRecord|null fetchRecord()
 * @method SimulatorRecord[] fetchRecords()
 * @method SimulatorRecordSet fetchRecordSet()
 */
class SimulatorSelect extends MapperSelect
{
}
