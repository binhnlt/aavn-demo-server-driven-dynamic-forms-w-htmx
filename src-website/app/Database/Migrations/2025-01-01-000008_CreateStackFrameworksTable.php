<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStackFrameworksTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'auto_increment' => true],
            'language_id'   => ['type' => 'INT'],
            'name'          => ['type' => 'VARCHAR', 'constraint' => 100],
            'setup_command' => ['type' => 'VARCHAR', 'constraint' => 200],
            'description'   => ['type' => 'VARCHAR', 'constraint' => 200],
            'libraries'     => ['type' => 'VARCHAR', 'constraint' => 300],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('language_id');
        $this->forge->createTable('stack_frameworks');
    }

    public function down(): void
    {
        $this->forge->dropTable('stack_frameworks');
    }
}
