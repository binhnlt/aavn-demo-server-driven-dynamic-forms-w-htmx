<?php

namespace App\Models;

use CodeIgniter\Model;

class TodoModel extends Model
{
    protected $table         = 'todos';
    protected $allowedFields = ['title', 'completed', 'created_at'];
    protected $useTimestamps = false;

    public function getAllOrdered(): array
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
}
