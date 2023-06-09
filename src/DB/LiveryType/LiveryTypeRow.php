<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace LiveryManager\DB\LiveryType;

use Atlas\Table\Row;

/**
 * @property mixed $id bigint(20,0) unsigned NOT NULL
 * @property mixed $name varchar(50) NOT NULL
 * @property mixed $description mediumtext(16777215)
 * @property mixed $created_at datetime NOT NULL
 */
class LiveryTypeRow extends Row
{
    protected $cols = [
        'id' => null,
        'name' => '\'\'',
        'description' => 'NULL',
        'created_at' => 'current_timestamp()',
    ];
}
