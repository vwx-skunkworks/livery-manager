<?php

use Phinx\Db\Adapter\MysqlAdapter;

class InitialSchema extends Phinx\Migration\AbstractMigration
{
    public function change()
    {
        $this->execute('SET unique_checks=0; SET foreign_key_checks=0;');
        $this->table('livery', [
                'id' => false,
                'primary_key' => ['id'],
                'engine' => 'InnoDB',
                'encoding' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'comment' => '',
                'row_format' => 'DYNAMIC',
            ])
            ->addColumn('id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
            ])
            ->addColumn('airframe_id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
                'after' => 'id',
            ])
            ->addColumn('livery_type_id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
                'after' => 'airframe_id',
            ])
            ->addColumn('name', 'string', [
                'null' => true,
                'default' => '',
                'limit' => 75,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'livery_type_id',
            ])
            ->addColumn('tailno', 'string', [
                'null' => true,
                'default' => '',
                'limit' => 20,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'name',
            ])
            ->addColumn('storage_path', 'string', [
                'null' => false,
                'default' => '/unassigned',
                'limit' => 75,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'tailno',
            ])
            ->addColumn('description', 'text', [
                'null' => true,
                'default' => null,
                'limit' => MysqlAdapter::TEXT_MEDIUM,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'storage_path',
            ])
            ->addColumn('enabled', 'integer', [
                'null' => false,
                'default' => '1',
                'limit' => MysqlAdapter::INT_TINY,
                'after' => 'description',
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'after' => 'enabled',
            ])
            ->create();
        $this->table('operation', [
                'id' => false,
                'primary_key' => ['id'],
                'engine' => 'InnoDB',
                'encoding' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'comment' => '',
                'row_format' => 'DYNAMIC',
            ])
            ->addColumn('id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'null' => false,
                'default' => '',
                'limit' => 50,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'id',
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'after' => 'name',
            ])
            ->addIndex(['name'], [
                'name' => 'name',
                'unique' => true,
            ])
            ->create();
        $this->table('developer', [
                'id' => false,
                'primary_key' => ['id'],
                'engine' => 'InnoDB',
                'encoding' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'comment' => '',
                'row_format' => 'DYNAMIC',
            ])
            ->addColumn('id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'null' => false,
                'default' => '',
                'limit' => 50,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'id',
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'after' => 'name',
            ])
            ->addIndex(['name'], [
                'name' => 'name',
                'unique' => true,
            ])
            ->create();
        $this->table('simulator', [
                'id' => false,
                'primary_key' => ['id'],
                'engine' => 'InnoDB',
                'encoding' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'comment' => '',
                'row_format' => 'DYNAMIC',
            ])
            ->addColumn('id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'null' => false,
                'default' => '',
                'limit' => 50,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'id',
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'after' => 'name',
            ])
            ->addIndex(['name'], [
                'name' => 'name',
                'unique' => true,
            ])
            ->create();
        $this->table('livery_type', [
                'id' => false,
                'primary_key' => ['id'],
                'engine' => 'InnoDB',
                'encoding' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'comment' => '',
                'row_format' => 'DYNAMIC',
            ])
            ->addColumn('id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'null' => false,
                'default' => '',
                'limit' => 50,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'id',
            ])
            ->addColumn('description', 'text', [
                'null' => true,
                'default' => null,
                'limit' => MysqlAdapter::TEXT_MEDIUM,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'name',
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'after' => 'description',
            ])
            ->addIndex(['name'], [
                'name' => 'name',
                'unique' => true,
            ])
            ->create();
        $this->table('livery_version', [
                'id' => false,
                'primary_key' => ['id'],
                'engine' => 'InnoDB',
                'encoding' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'comment' => '',
                'row_format' => 'DYNAMIC',
            ])
            ->addColumn('id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
            ])
            ->addColumn('livery_id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
                'after' => 'id',
            ])
            ->addColumn('version', 'integer', [
                'null' => false,
                'limit' => '10',
                'signed' => false,
                'after' => 'livery_id',
            ])
            ->addColumn('changelog', 'text', [
                'null' => true,
                'default' => null,
                'limit' => MysqlAdapter::TEXT_MEDIUM,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'version',
            ])
            ->addColumn('file_name', 'string', [
                'null' => false,
                'default' => '',
                'limit' => 100,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'changelog',
            ])
            ->addColumn('enabled', 'integer', [
                'null' => false,
                'default' => '1',
                'limit' => MysqlAdapter::INT_TINY,
                'after' => 'file_name',
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'after' => 'enabled',
            ])
            ->addIndex(['file_name'], [
                'name' => 'file_name',
                'unique' => true,
            ])
            ->create();
        $this->table('airframe', [
                'id' => false,
                'primary_key' => ['id'],
                'engine' => 'InnoDB',
                'encoding' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'comment' => '',
                'row_format' => 'DYNAMIC',
            ])
            ->addColumn('id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
            ])
            ->addColumn('operation_id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
                'after' => 'id',
            ])
            ->addColumn('developer_id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
                'after' => 'operation_id',
            ])
            ->addColumn('simulator_id', 'integer', [
                'null' => false,
                'limit' => MysqlAdapter::INT_BIG,
                'signed' => false,
                'after' => 'developer_id',
            ])
            ->addColumn('name', 'string', [
                'null' => false,
                'default' => '',
                'limit' => 75,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'simulator_id',
            ])
            ->addColumn('icao', 'string', [
                'null' => true,
                'default' => null,
                'limit' => 6,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'name',
            ])
            ->addColumn('description', 'text', [
                'null' => true,
                'default' => null,
                'limit' => MysqlAdapter::TEXT_MEDIUM,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'icao',
            ])
            ->addColumn('enabled', 'integer', [
                'null' => false,
                'default' => '1',
                'limit' => MysqlAdapter::INT_TINY,
                'after' => 'description',
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'after' => 'enabled',
            ])
            ->create();
        $this->execute('SET unique_checks=1; SET foreign_key_checks=1;');
    }
}
