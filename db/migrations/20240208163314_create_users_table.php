<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up(): void
    {
        $table = $this->table('users');
        $table->addColumn('username', 'string', ['limit' => 50, 'null' => false])
              ->addColumn('password', 'string', ['limit' => 255, 'null' => false])
              ->addColumn('role', 'enum', ['values' => ['admin', 'user'], 'default' => 'user'])
              ->addColumn('created_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
              ->addIndex(['username'], ['unique' => true])
              ->create();
    }

    public function down(): void
    {
        $this->table('users')->drop()->save();
    }
}
