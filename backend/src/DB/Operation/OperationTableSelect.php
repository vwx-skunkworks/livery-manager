<?php
declare(strict_types=1);

namespace LiveryManager\DB\Operation;

use Atlas\Table\TableSelect;

/**
 * @method OperationRow|null fetchRow()
 * @method OperationRow[] fetchRows()
 */
class OperationTableSelect extends TableSelect
{
}
