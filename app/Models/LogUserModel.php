<?php

namespace App\Models;

use CodeIgniter\Model;

class LogUserModel extends Model
{
    protected $table      = 'log_user';
    protected $primaryKey = 'id_logUser';
    protected $useTimestamps = true;
    protected $allowedFields = ['user', 'action', 'activity'];

    public function search($keyword)
    {
        return $this->table('log_user')->like('user', $keyword)->orLike('action', $keyword);
    }
}
