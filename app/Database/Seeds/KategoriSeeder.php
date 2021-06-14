<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class KategoriSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'Personal Computer',
                'img'         => 'personal-computer.jpg',
                'created_at'  => Time::now(),
            ],
            [
                'name'        => 'Switch',
                'img'         => 'switch.jpg',
                'created_at'  => Time::now(),
            ],
            [
                'name'        => 'Access Point',
                'img'         => 'access-point.png',
                'created_at'  => Time::now(),
            ],
            [
                'name'        => 'IP Camera',
                'img'         => 'ip-camera.jpg',
                'created_at'  => Time::now(),
            ],
            [
                'name'        => 'Website',
                'img'         => 'website.jpg',
                'created_at'  => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('kategori')->insertBatch($data);
    }
}
