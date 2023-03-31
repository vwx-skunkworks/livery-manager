<?php
/**
 * This file was generated by Atlas. Changes will be overwritten.
 */
declare(strict_types=1);

namespace LiveryManager\DB\Phinxlog\_generated;

use Atlas\Mapper\RecordSet;
use LiveryManager\DB\Phinxlog\PhinxlogRecord;
use LiveryManager\DB\Phinxlog\PhinxlogRecordSet;

/**
 * @method __construct(PhinxlogRecord[], callable $newRecordFactory)
 * @method PhinxlogRecord offsetGet($offset)
 * @method PhinxlogRecord appendNew(array $fields = [])
 * @method ?PhinxlogRecord getOneBy(array $whereEquals)
 * @method PhinxlogRecordSet getAllBy(array $whereEquals)
 * @method ?PhinxlogRecord detachOneBy(array $whereEquals)
 * @method PhinxlogRecordSet detachAllBy(array $whereEquals)
 * @method PhinxlogRecordSet detachAll()
 * @method PhinxlogRecordSet detachDeleted()
 */
abstract class PhinxlogRecordSet_ extends RecordSet
{
}
