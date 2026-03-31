<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['id' => 1, 'name' => 'Employee'],
            ['id' => 2, 'name' => 'Freelancer'],
            ['id' => 3, 'name' => 'Business'],
            ['id' => 4, 'name' => 'Student'],
        ];

        $this->db->table('categories')->insertBatch($categories);

        $subcategories = [
            // Employee
            ['category_id' => 1, 'name' => 'Engineering / IT'],
            ['category_id' => 1, 'name' => 'Sales / Business Development'],
            ['category_id' => 1, 'name' => 'Marketing'],
            ['category_id' => 1, 'name' => 'Finance / Accounting'],
            ['category_id' => 1, 'name' => 'Human Resources'],
            // Freelancer
            ['category_id' => 2, 'name' => 'Software Development'],
            ['category_id' => 2, 'name' => 'Design / UX'],
            ['category_id' => 2, 'name' => 'Content Creation'],
            ['category_id' => 2, 'name' => 'Consulting'],
            // Business
            ['category_id' => 3, 'name' => 'Startup'],
            ['category_id' => 3, 'name' => 'SME (Small & Medium Enterprise)'],
            ['category_id' => 3, 'name' => 'Enterprise'],
            // Student
            ['category_id' => 4, 'name' => 'Undergraduate'],
            ['category_id' => 4, 'name' => 'Associate / College'],
            ['category_id' => 4, 'name' => 'Graduate / Postgraduate'],
        ];

        $this->db->table('subcategories')->insertBatch($subcategories);
    }
}
