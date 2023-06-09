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

namespace LiveryManager\DB\Airframe;

use Atlas\Table\Row;
use Atlas\Table\Table;
use Atlas\Table\TableEvents;

use Dflydev\Base32\Crockford\Crockford;

use function date;

class AirframeTableEvents extends TableEvents
{
    public function beforeInsertRow(Table $table, Row $row): ?array
    {
        /** @var AirframeRow $row */
        $row->created_at = date('Y-m-d H:i:s');

        $row->simulator_id = Crockford::decode($row->simulator_id);
        $row->operation_id = Crockford::decode($row->operation_id);
        $row->developer_id = Crockford::decode($row->developer_id);

        return null;
    }
}
