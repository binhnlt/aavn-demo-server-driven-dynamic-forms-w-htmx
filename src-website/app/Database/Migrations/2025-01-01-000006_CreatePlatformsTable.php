<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePlatformsTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'   => ['type' => 'INT', 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'icon' => ['type' => 'VARCHAR', 'constraint' => 50],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('platforms');
    }

    public function down(): void
    {
        $this->forge->dropTable('platforms');
    }
}
