<?php

namespace App\Models;

use CodeIgniter\Model;

class SubcategoryModel extends Model
{
    protected $table         = 'subcategories';
    protected $allowedFields = ['category_id', 'name'];

    public function getByCategoryId(int $categoryId): array
    {
        return $this->where('category_id', $categoryId)->findAll();
    }
}
