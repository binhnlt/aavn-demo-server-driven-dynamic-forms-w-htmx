<?php

namespace App\Models;

use CodeIgniter\Model;

class PlatformModel extends Model
{
    protected $table         = 'platforms';
    protected $allowedFields = ['name', 'icon'];
}
