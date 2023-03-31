<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace LiveryManager\DB\Phinxlog\_generated;

use Atlas\Table\Row;

/**
 * @property mixed $version bigint(19,0) NOT NULL
 * @property mixed $migration_name varchar(100)
 * @property mixed $start_time timestamp
 * @property mixed $end_time timestamp
 * @property mixed $breakpoint tinyint(3,0) NOT NULL
 */
abstract class PhinxlogRow_ extends Row
{
    protected mixed $version = null;
    protected mixed $migration_name = null;
    protected mixed $start_time = null;
    protected mixed $end_time = null;
    protected mixed $breakpoint = 0;
}
