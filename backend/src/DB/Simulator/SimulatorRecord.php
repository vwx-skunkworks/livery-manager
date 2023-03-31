<?php
declare(strict_types=1);

namespace LiveryManager\DB\Simulator;

use Atlas\Mapper\Record;

/**
 * @method SimulatorRow getRow()
 */
class SimulatorRecord extends Record
{
    use SimulatorFields;
}
