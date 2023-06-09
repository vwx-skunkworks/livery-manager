<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace LiveryManager\DB\Simulator;

use Atlas\Table\Table;

/**
 * @method SimulatorRow|null fetchRow($primaryVal)
 * @method SimulatorRow[] fetchRows(array $primaryVals)
 * @method SimulatorTableSelect select(array $whereEquals = [])
 * @method SimulatorRow newRow(array $cols = [])
 * @method SimulatorRow newSelectedRow(array $cols)
 */
class SimulatorTable extends Table
{
    const DRIVER = 'mysql';

    const NAME = 'simulator';

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
        'name' => array (
  'name' => 'name',
  'type' => 'varchar',
  'size' => 50,
  'scale' => NULL,
  'notnull' => true,
  'default' => '\'\'',
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
        'name',
        'created_at',
    ];

    const COLUMN_DEFAULTS = [
        'id' => null,
        'name' => '\'\'',
        'created_at' => 'current_timestamp()',
    ];

    const PRIMARY_KEY = [
        'id',
    ];

    const AUTOINC_COLUMN = null;

    const AUTOINC_SEQUENCE = null;
}
