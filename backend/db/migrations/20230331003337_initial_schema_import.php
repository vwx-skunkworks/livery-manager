<?php

use Phinx\Db\Adapter\MysqlAdapter;

class InitialSchemaImport extends Phinx\Migration\AbstractMigration
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
                'limit' => '10',
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'null' => true,
                'default' => '',
                'limit' => 75,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'id',
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
            ->addColumn('airframe_id', 'integer', [
                'null' => false,
                'limit' => '10',
                'signed' => false,
                'after' => 'storage_path',
            ])
            ->addColumn('livery_type_id', 'integer', [
                'null' => false,
                'limit' => '10',
                'signed' => false,
                'after' => 'airframe_id',
            ])
            ->addColumn('developer_id', 'integer', [
                'null' => false,
                'limit' => '10',
                'signed' => false,
                'after' => 'livery_type_id',
            ])
            ->addColumn('simulator_id', 'integer', [
                'null' => false,
                'limit' => '10',
                'signed' => false,
                'after' => 'developer_id',
            ])
            ->addColumn('enabled', 'integer', [
                'null' => false,
                'default' => '1',
                'limit' => MysqlAdapter::INT_TINY,
                'after' => 'simulator_id',
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'after' => 'enabled',
            ])
            ->addIndex(['name'], [
                'name' => 'name',
                'unique' => true,
            ])
            ->addIndex(['livery_type_id'], [
                'name' => 'fk_livery_type_airframe',
                'unique' => false,
            ])
            ->addIndex(['developer_id'], [
                'name' => 'fk_livery_developer',
                'unique' => false,
            ])
            ->addIndex(['simulator_id'], [
                'name' => 'fk_livery_simulator',
                'unique' => false,
            ])
            ->addIndex(['airframe_id'], [
                'name' => 'fk_livery_airframe',
                'unique' => false,
            ])
            ->addForeignKey('airframe_id', 'airframe', 'id', [
                'constraint' => 'fk_livery_airframe',
                'update' => 'RESTRICT',
                'delete' => 'RESTRICT',
            ])
            ->addForeignKey('developer_id', 'developer', 'id', [
                'constraint' => 'fk_livery_developer',
                'update' => 'RESTRICT',
                'delete' => 'RESTRICT',
            ])
            ->addForeignKey('simulator_id', 'simulator', 'id', [
                'constraint' => 'fk_livery_simulator',
                'update' => 'RESTRICT',
                'delete' => 'RESTRICT',
            ])
            ->addForeignKey('livery_type_id', 'livery_type', 'id', [
                'constraint' => 'fk_livery_type_airframe',
                'update' => 'RESTRICT',
                'delete' => 'RESTRICT',
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
                'limit' => '10',
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
                'limit' => '10',
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
                'limit' => '10',
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
                'limit' => '10',
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
        $this->table('livery_version', [
                'id' => false,
                'primary_key' => ['file_name'],
                'engine' => 'InnoDB',
                'encoding' => 'utf8mb4',
                'collation' => 'utf8mb4_general_ci',
                'comment' => '',
                'row_format' => 'DYNAMIC',
            ])
            ->addColumn('id', 'integer', [
                'null' => false,
                'limit' => '10',
                'signed' => false,
            ])
            ->addColumn('version', 'integer', [
                'null' => false,
                'limit' => '10',
                'signed' => false,
                'after' => 'id',
            ])
            ->addColumn('file_name', 'string', [
                'null' => false,
                'default' => '',
                'limit' => 100,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'version',
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
                'limit' => '10',
                'signed' => false,
            ])
            ->addColumn('name', 'string', [
                'null' => false,
                'default' => '',
                'limit' => 75,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'id',
            ])
            ->addColumn('icao', 'string', [
                'null' => true,
                'default' => null,
                'limit' => 6,
                'collation' => 'utf8mb4_general_ci',
                'encoding' => 'utf8mb4',
                'after' => 'name',
            ])
            ->addColumn('operation_id', 'integer', [
                'null' => false,
                'limit' => '10',
                'signed' => false,
                'after' => 'icao',
            ])
            ->addColumn('enabled', 'integer', [
                'null' => false,
                'default' => '1',
                'limit' => MysqlAdapter::INT_TINY,
                'after' => 'operation_id',
            ])
            ->addColumn('created_at', 'datetime', [
                'null' => false,
                'default' => 'CURRENT_TIMESTAMP',
                'after' => 'enabled',
            ])
            ->addIndex(['name'], [
                'name' => 'name',
                'unique' => true,
            ])
            ->addIndex(['operation_id'], [
                'name' => 'fk_airframe_operation',
                'unique' => false,
            ])
            ->addForeignKey('operation_id', 'operation', 'id', [
                'constraint' => 'fk_airframe_operation',
                'update' => 'RESTRICT',
                'delete' => 'RESTRICT',
            ])
            ->create();
        $this->execute('SET unique_checks=1; SET foreign_key_checks=1;');
    }
}
