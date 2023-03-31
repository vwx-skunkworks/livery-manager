<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace LiveryManager\DB\LiveryType;

use Atlas\Table\Table;

/**
 * @method LiveryTypeRow|null fetchRow($primaryVal)
 * @method LiveryTypeRow[] fetchRows(array $primaryVals)
 * @method LiveryTypeTableSelect select(array $whereEquals = [])
 * @method LiveryTypeRow newRow(array $cols = [])
 * @method LiveryTypeRow newSelectedRow(array $cols)
 */
class LiveryTypeTable extends Table
{
    const DRIVER = 'mysql';

    const NAME = 'livery_type';

    const COLUMNS = [
        'id' => array (
  'name' => 'id',
  'type' => 'int unsigned',
  'size' => 10,
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
