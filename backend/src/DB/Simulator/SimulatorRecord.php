<?php

declare(strict_types=1);

namespace LiveryManager\DB\Simulator;

use Atlas\Mapper\Record;
use Odan\Tsid\Tsid;

class SimulatorRecord extends Record
{
    use SimulatorFields;

    public function jsonSerialize() : array
    {
        $arr = $this->getArrayCopy();
        $arr['id'] = (new Tsid($arr['id']))->toString();

        return $arr;
    }

}
