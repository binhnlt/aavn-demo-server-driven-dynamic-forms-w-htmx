<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductsTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'       => ['type' => 'INTEGER', 'auto_increment' => true],
            'name'     => ['type' => 'VARCHAR', 'constraint' => 200],
            'brand'    => ['type' => 'VARCHAR', 'constraint' => 100],
            'price'    => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'category' => ['type' => 'VARCHAR', 'constraint' => 100],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('products');
    }

    public function down(): void
    {
        $this->forge->dropTable('products');
    }
}
