<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class AddressSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        $address1 = '192.168.1.1';
        $address2 = '192.168.1.2';
        $address3 = '192.168.1.3';
        $address4 = '192.168.1.4';
        $address5 = '192.168.1.5';
        $address6 = '192.168.1.254';
        $data = [
            [
                'device_name' => 'Main server',
                'address'     => $address1,
                'slug'        => md5($address1),
                'location'    => 'Control room',
                'categori'    => 'Personal Computer',
                'img_kat'     => 'personal-computer.jpg',
                'http'        => 'Disconnect',
                'status'      => 'Disconnect',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'device_name' => 'PC 1',
                'address'     => $address2,
                'slug'        => md5($address2),
                'location'    => 'Office room',
                'categori'    => 'Personal Computer',
                'img_kat'     => 'personal-computer.jpg',
                'http'        => 'Disconnect',
                'status'      => 'Disconnect',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'device_name' => 'PC 2',
                'address'     => $address3,
                'slug'        => md5($address3),
                'location'    => 'Office room',
                'categori'    => 'Personal Computer',
                'img_kat'     => 'personal-computer.jpg',
                'http'        => 'Disconnect',
                'status'      => 'Disconnect',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'device_name' => 'PC 3',
                'address'     => $address4,
                'slug'        => md5($address4),
                'location'    => 'Office room',
                'categori'    => 'Personal Computer',
                'img_kat'     => 'personal-computer.jpg',
                'http'        => 'Disconnect',
                'status'      => 'Disconnect',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
            [
                'device_name' => 'PC 4',
                'address'     => $address5,
                'slug'        => md5($address5),
                'location'    => 'Office room',
                'categori'    => 'Personal Computer',
                'img_kat'     => 'personal-computer.jpg',
                'http'         => 'Disconnect',
                'status'      => 'Disconnect',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ], [
                'device_name' => 'Switch hub',
                'address'     => $address6,
                'slug'        => md5($address6),
                'location'    => 'Control room',
                'categori'    => 'Switch',
                'img_kat'     => 'switch.jpg',
                'http'        => 'Disconnect',
                'status'      => 'Disconnect',
                'created_at'  => Time::now(),
                'updated_at'  => Time::now()
            ],
        ];

        // Simple Queries
        // $this->db->query(
        //     "INSERT INTO users (username, email) VALUES(:username:, :email:)",
        //     $data
        // );

        // Using Query Builder
        $this->db->table('address')->insertBatch($data);
    }
}
