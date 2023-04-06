<?php
/*
 * Copyright (c) 2023 VWX Systems
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

declare(strict_types=1);

namespace LiveryManager\DB\Developer;

use Atlas\Mapper\Record;
use Odan\Tsid\Tsid;

/**
 * @method DeveloperRow getRow()
 */
class DeveloperRecord extends Record
{
    use DeveloperFields;

    public function jsonSerialize() : array
    {
        $arr = $this->getArrayCopy();
        $arr['id'] = (new Tsid($arr['id']))->toString();

        return $arr;
    }
}
