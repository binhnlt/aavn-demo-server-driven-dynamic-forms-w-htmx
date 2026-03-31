<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticlesTable extends Migration
{
    public function up(): void
    {
        $this->forge->addField([
            'id'         => ['type' => 'INTEGER', 'auto_increment' => true],
            'title'      => ['type' => 'VARCHAR', 'constraint' => 200],
            'excerpt'    => ['type' => 'TEXT'],
            'author'     => ['type' => 'VARCHAR', 'constraint' => 100],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('articles');
    }

    public function down(): void
    {
        $this->forge->dropTable('articles');
    }
}
