<?php

namespace App\Models;

use CodeIgniter\Model;

class StackLanguageModel extends Model
{
    protected $table         = 'stack_languages';
    protected $allowedFields = ['platform_id', 'name'];

    public function getByPlatform(int $platformId): array
    {
        return $this->where('platform_id', $platformId)->findAll();
    }
}
