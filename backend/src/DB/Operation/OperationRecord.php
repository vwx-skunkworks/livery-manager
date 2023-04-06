<?php

declare(strict_types=1);

namespace LiveryManager\DB\Operation;

use Atlas\Mapper\Record;
use Odan\Tsid\Tsid;

/**
 * @method OperationRow getRow()
 */
class OperationRecord extends Record
{
    use OperationFields;

    public function jsonSerialize() : array
    {
        $arr = $this->getArrayCopy();
        $arr['id'] = (new Tsid($arr['id']))->toString();

        return $arr;
    }
}
