<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MainSeeder extends Seeder
{
    public function run(): void
    {
        $this->call('ProductSeeder');
        $this->call('CategorySeeder');
        $this->call('TodoSeeder');
        $this->call('ArticleSeeder');
        $this->call('TechStackSeeder');
    }
}
