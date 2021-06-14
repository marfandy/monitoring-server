<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Log_user extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_logUser'         => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user'       		 => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'action' 				 => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'activity' 				 => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
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
		$this->forge->addKey('id_logUser', true);
		$this->forge->createTable('log_user');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('log_user');
	}
}
