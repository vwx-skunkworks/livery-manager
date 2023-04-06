<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace LiveryManager\DB\Airframe;

use Atlas\Table\Table;

/**
 * @method AirframeRow|null fetchRow($primaryVal)
 * @method AirframeRow[] fetchRows(array $primaryVals)
 * @method AirframeTableSelect select(array $whereEquals = [])
 * @method AirframeRow newRow(array $cols = [])
 * @method AirframeRow newSelectedRow(array $cols)
 */
class AirframeTable extends Table
{
    const DRIVER = 'mysql';

    const NAME = 'airframe';

    const COLUMNS = [
        'id' => array (
  'name' => 'id',
  'type' => 'bigint unsigned',
  'size' => 20,
  'scale' => 0,
  'notnull' => true,
  'default' => NULL,
  'autoinc' => false,
  'primary' => true,
  'options' => NULL,
),
        'operation_id' => array (
  'name' => 'operation_id',
  'type' => 'bigint unsigned',
  'size' => 20,
  'scale' => 0,
  'notnull' => true,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'developer_id' => array (
  'name' => 'developer_id',
  'type' => 'bigint unsigned',
  'size' => 20,
  'scale' => 0,
  'notnull' => true,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'simulator_id' => array (
  'name' => 'simulator_id',
  'type' => 'bigint unsigned',
  'size' => 20,
  'scale' => 0,
  'notnull' => true,
  'default' => NULL,
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'name' => array (
  'name' => 'name',
  'type' => 'varchar',
  'size' => 75,
  'scale' => NULL,
  'notnull' => true,
  'default' => '\'\'',
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'icao' => array (
  'name' => 'icao',
  'type' => 'varchar',
  'size' => 6,
  'scale' => NULL,
  'notnull' => false,
  'default' => 'NULL',
  'autoinc' => false,
  'primary' => false,
  'options' => NULL,
),
        'description' => array (
  'name' => 'description',
  'type' => 'mediumtext',
  'size' => 16777215,
  'scale' => NULL,
  'notnull' => false,
  'default' => 'NULL',
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
        'operation_id',
        'developer_id',
        'simulator_id',
        'name',
        'icao',
        'description',
        'enabled',
        'created_at',
    ];

    const COLUMN_DEFAULTS = [
        'id' => null,
        'operation_id' => null,
        'developer_id' => null,
        'simulator_id' => null,
        'name' => '\'\'',
        'icao' => 'NULL',
        'description' => 'NULL',
        'enabled' => 1,
        'created_at' => 'current_timestamp()',
    ];

    const PRIMARY_KEY = [
        'id',
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
