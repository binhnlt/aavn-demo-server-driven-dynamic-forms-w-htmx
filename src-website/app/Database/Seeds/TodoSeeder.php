<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TodoSeeder extends Seeder
{
    public function run(): void
    {
        $todos = [
            ['title' => 'Read the HTMX documentation', 'completed' => 1, 'created_at' => date('Y-m-d H:i:s', strtotime('-5 days'))],
            ['title' => 'Set up Docker environment', 'completed' => 1, 'created_at' => date('Y-m-d H:i:s', strtotime('-4 days'))],
            ['title' => 'Build the CodeIgniter 4 demo app', 'completed' => 0, 'created_at' => date('Y-m-d H:i:s', strtotime('-3 days'))],
            ['title' => 'Write the presentation slides', 'completed' => 0, 'created_at' => date('Y-m-d H:i:s', strtotime('-2 days'))],
            ['title' => 'Rehearse the live demo', 'completed' => 0, 'created_at' => date('Y-m-d H:i:s', strtotime('-1 day'))],
            ['title' => 'Prepare Q&A answers', 'completed' => 0, 'created_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('todos')->insertBatch($todos);
    }
}
