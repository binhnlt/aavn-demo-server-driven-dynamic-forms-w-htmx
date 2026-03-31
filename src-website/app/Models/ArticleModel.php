<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table         = 'articles';
    protected $allowedFields = ['title', 'excerpt', 'author', 'created_at'];
    protected $useTimestamps = false;

    public function getPage(int $page, int $perPage = 10): array
    {
        return $this->orderBy('id', 'DESC')
            ->findAll($perPage, ($page - 1) * $perPage);
    }

    public function hasMore(int $page, int $perPage = 10): bool
    {
        return $this->countAllResults() > $page * $perPage;
    }
}
