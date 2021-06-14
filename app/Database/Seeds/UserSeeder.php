<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class UserSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $data = [
            [
                'firstname'     => 'Dimas',
                'lastname'      => 'Novergus',
                'username'      => 'dimas',
                'passwd'        => password_hash(12345, PASSWORD_DEFAULT),
                'level'         => 'Admin',
                'created_at'    => Time::now(),
            ],
            [
                'firstname'     => 'Super',
                'lastname'      => 'Admin',
                'username'      => 'root',
                'passwd'        => password_hash(12345, PASSWORD_DEFAULT),
                'level'         => 'Admin',
                'created_at'    => Time::now(),
            ],
            [
                'firstname'     => 'User',
                'lastname'      => 'Name',
                'username'      => 'user',
                'passwd'        => password_hash(12345, PASSWORD_DEFAULT),
                'level'         => 'User',
                'created_at'    => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('user')->insertBatch($data);
    }
}
