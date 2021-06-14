<?php

namespace App\Models;

use CodeIgniter\Model;

class StatusModel extends Model
{
    protected $table      = 'status';
    protected $primaryKey = 'id_status';
    // protected $useTimestamps = true;
    protected $allowedFields = ['device_name', 'address', 'location', 'status', 'created_at'];
}
