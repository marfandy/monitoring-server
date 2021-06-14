<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Address extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_address'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'device_name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'address' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'slug' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'location' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'categori' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'img_kat' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'http'   	 => [
				'type'           => 'VARCHAR',
				'constraint'	 => '255',
			],
			'status'   	 => [
				'type'           => 'VARCHAR',
				'constraint'     => '50',
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
		]);
		$this->forge->addKey('id_address', true);
		$this->forge->createTable('address');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('address');
	}
}
