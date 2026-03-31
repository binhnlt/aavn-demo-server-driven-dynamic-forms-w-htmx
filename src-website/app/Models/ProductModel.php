<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table         = 'products';
    protected $allowedFields = ['name', 'brand', 'price', 'category'];

    public function search(string $q): array
    {
        if ($q === '') {
            return [];
        }

        return $this->groupStart()
            ->like('name', $q)
            ->orLike('brand', $q)
            ->orLike('category', $q)
            ->groupEnd()
            ->orderBy('name', 'ASC')
            ->findAll(20);
    }
}
