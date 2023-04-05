<?php

declare(strict_types=1);

namespace LiveryManager\DB\Operation;

use Atlas\Mapper\Record;

/**
 * @method OperationRow getRow()
 */
class OperationRecord extends Record
{
    use OperationFields;
}
