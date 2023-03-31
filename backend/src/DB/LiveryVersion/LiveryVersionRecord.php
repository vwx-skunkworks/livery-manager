<?php
declare(strict_types=1);

namespace LiveryManager\DB\LiveryVersion;

use Atlas\Mapper\Record;

/**
 * @method LiveryVersionRow getRow()
 */
class LiveryVersionRecord extends Record
{
    use LiveryVersionFields;
}
