<?php

namespace App\Models;

use CodeIgniter\Model;

class StackFrameworkModel extends Model
{
    protected $table         = 'stack_frameworks';
    protected $allowedFields = ['language_id', 'name', 'setup_command', 'description', 'libraries'];

    public function getByLanguage(int $languageId): array
    {
        return $this->where('language_id', $languageId)->findAll();
    }
}
