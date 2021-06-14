<?php

namespace App\Models;

use CodeIgniter\Model;

class LogHostModel extends Model
{
    protected $table      = 'log_status';
    protected $primaryKey = 'id_status';
    // protected $useTimestamps = true;
    // protected $allowedFields = ['user', 'action', 'activity'];

}
