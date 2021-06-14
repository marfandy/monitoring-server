<?php

namespace App\Models;

use CodeIgniter\Model;

class HostModel extends Model
{
    protected $table      = 'address';
    protected $primaryKey = 'id_address';
    protected $useTimestamps = true;
    protected $allowedFields = ['device_name', 'address', 'slug', 'location', 'categori', 'img_kat', 'http', 'status'];

    public function getAddress($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getKategori($categori = false)
    {
        if ($categori == false) {
            return $this->findAll();
        }

        return $this->where(['categori' => $categori])->findAll();
    }

    public function homeStatus($status = false)
    {
        if ($status == false) {
            return $this->findAll();
        } elseif ($status == 'http') {
            return $this->where(['http' => 'Connect'])->findAll();
        } else {
            return $this->where(['status' => $status])->findAll();
        }
    }
}
