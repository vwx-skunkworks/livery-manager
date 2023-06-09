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

use Atlas\Mapper\MapperRelationships;
use LiveryManager\DB\Airframe\Airframe;
use LiveryManager\DB\LiveryType\LiveryType;
use LiveryManager\DB\LiveryVersion\LiveryVersion;

class LiveryRelationships extends MapperRelationships
{
    protected function define(): void
    {
        $this->oneToOne('airframe', Airframe::class);
        $this->oneToOne('livery_type', LiveryType::class);
        $this->oneToMany('versions', LiveryVersion::class);
    }
}
