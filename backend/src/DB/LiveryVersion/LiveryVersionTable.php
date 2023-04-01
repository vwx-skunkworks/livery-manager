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

/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace LiveryManager\DB\LiveryVersion;

use Atlas\Table\Table;

/**
 * @method LiveryVersionRow|null fetchRow($primaryVal)
 * @method LiveryVersionRow[] fetchRows(array $primaryVals)
 * @method LiveryVersionTableSelect select(array $whereEquals = [])
 * @method LiveryVersionRow newRow(array $cols = [])
 * @method LiveryVersionRow newSelectedRow(array $cols)
 */
class LiveryVersionTable extends Table
{
    const DRIVER = 'mysql';

    const NAME = 'livery_version';

    const COLUMNS = [
        'id' => array (
  'name' => 'id',
  'type' => 'int unsigned',
  'size' => 10,
  'scale' => 0,
  'notnull' => true,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'livery_id' => array (
  'name' => 'livery_id',
  'type' => 'int unsigned',
  'size' => 10,
  'scale' => 0,
  'notnull' => true,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'version' => array (
  'name' => 'version',
  'type' => 'int unsigned',
  'size' => 10,
  'scale' => 0,
  'notnull' => true,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'changelog' => array (
  'name' => 'changelog',
  'type' => 'mediumtext',
  'size' => 16777215,
  'scale' => NULL,
  'notnull' => false,
  'default' => 'NULL',
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'file_name' => array (
  'name' => 'file_name',
  'type' => 'varchar',
  'size' => 100,
  'scale' => NULL,
  'notnull' => true,
  'default' => '\'\'',
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'enabled' => array (
  'name' => 'enabled',
  'type' => 'tinyint unsigned',
  'size' => 3,
  'scale' => 0,
  'notnull' => true,
  'default' => 1,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'created_at' => array (
  'name' => 'created_at',
  'type' => 'datetime',
  'size' => NULL,
  'scale' => NULL,
  'notnull' => true,
  'default' => 'current_timestamp()',
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
    ];

    const COLUMN_NAMES = [
        'id',
        'livery_id',
        'version',
        'changelog',
        'file_name',
        'enabled',
        'created_at',
    ];

    const COLUMN_DEFAULTS = [
        'id' => null,
        'livery_id' => null,
        'version' => null,
        'changelog' => 'NULL',
        'file_name' => '\'\'',
        'enabled' => 1,
        'created_at' => 'current_timestamp()',
    ];

    const PRIMARY_KEY = [
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
