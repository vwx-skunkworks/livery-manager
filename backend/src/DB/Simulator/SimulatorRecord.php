<?php

declare(strict_types=1);

namespace LiveryManager\DB\Simulator;

use Atlas\Mapper\Record;
use Atlas\Mapper\Related;
use Atlas\Table\Row;

class SimulatorRecord extends Record
{
    use SimulatorFields;

    public function __construct(Row $row, Related $related)
    {
        /** @var SimulatorRow $row */
        $row->id = (string) $row->id;

        parent::__construct($row, $related);
    }
}
