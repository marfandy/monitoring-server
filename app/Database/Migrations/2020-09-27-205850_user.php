<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user'         => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'firstname'       		 => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'lastname'       		 => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'username' 			 => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'passwd'			 => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'level' 			 => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'last_online'  		 => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'created_at'  		 => [
				'type'           => 'DATETIME',
				'null'           => true,
			],
			'updated_at'  		 => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
		]);
		$this->forge->addKey('id_user', true);
		$this->forge->createTable('user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('user');
	}
}
