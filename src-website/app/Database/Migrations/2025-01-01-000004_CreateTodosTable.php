<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTodosTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'         => ['type' => 'INTEGER', 'auto_increment' => true],
            'title'      => ['type' => 'VARCHAR', 'constraint' => 200],
            'completed'  => ['type' => 'INTEGER', 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('todos');
    }

    public function down(): void
    {
        $this->forge->dropTable('todos');
    }
}
