<?php
declare(strict_types=1);

namespace LiveryManager\DB\Developer;

use Atlas\Mapper\Record;

/**
 * @method DeveloperRow getRow()
 */
class DeveloperRecord extends Record
{
    use DeveloperFields;
}
