<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $table = 'global_configuration';
    protected $primaryKey = 'id';
    protected $allowedFields = ['param_name', 'param_value'];

}

