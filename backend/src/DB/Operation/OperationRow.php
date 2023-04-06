<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace LiveryManager\DB\Operation;

use Atlas\Table\Row;

/**
 * @property mixed $id bigint(20,0) unsigned NOT NULL
 * @property mixed $name varchar(50) NOT NULL
 * @property mixed $created_at datetime NOT NULL
 */
class OperationRow extends Row
{
    protected $cols = [
        'id' => null,
        'name' => '\'\'',
        'created_at' => 'current_timestamp()',
    ];
}
