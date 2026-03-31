<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStackLanguagesTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'auto_increment' => true],
            'platform_id' => ['type' => 'INT'],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('platform_id');
        $this->forge->createTable('stack_languages');
    }

    public function down(): void
    {
        $this->forge->dropTable('stack_languages');
    }
}
