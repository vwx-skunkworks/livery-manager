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

namespace LiveryManager\DB\Livery;

use Atlas\Mapper\Record;
use LiveryManager\DB\Airframe\Airframe;
use LiveryManager\DB\Developer\Developer;
use LiveryManager\DB\LiveryType\LiveryType;
use LiveryManager\DB\Simulator\Simulator;

/**
 * @method LiveryRow getRow()
 * @property Airframe $airframe
 * @property LiveryType $liveryType
 * @property Developer$developer
 * @property Simulator$simulator
 */
class LiveryRecord extends Record
{
    use LiveryFields;
}
