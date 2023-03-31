<?php
declare(strict_types=1);

namespace LiveryManager\DB\Livery;

use Atlas\Mapper\Record;

/**
 * @method LiveryRow getRow()
 */
class LiveryRecord extends Record
{
    use LiveryFields;
}
