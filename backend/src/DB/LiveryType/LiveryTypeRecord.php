<?php

declare(strict_types=1);

namespace LiveryManager\DB\LiveryType;

use Atlas\Mapper\Record;

/**
 * @method LiveryTypeRow getRow()
 */
class LiveryTypeRecord extends Record
{
    use LiveryTypeFields;
}
