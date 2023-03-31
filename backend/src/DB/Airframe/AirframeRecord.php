<?php
declare(strict_types=1);

namespace LiveryManager\DB\Airframe;

use Atlas\Mapper\Record;

/**
 * @method AirframeRow getRow()
 */
class AirframeRecord extends Record
{
    use AirframeFields;
}
