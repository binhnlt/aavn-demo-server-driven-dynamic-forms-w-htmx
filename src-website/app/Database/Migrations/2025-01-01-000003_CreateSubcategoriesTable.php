<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubcategoriesTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'          => ['type' => 'INTEGER', 'auto_increment' => true],
            'category_id' => ['type' => 'INTEGER'],
            'name'        => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('subcategories');
    }

    public function down(): void
    {
        $this->forge->dropTable('subcategories');
    }
}
