<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Log_status extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_status'         => [
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
			'location' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'status'       		 => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'created_at'  		 => [
				'type'           => 'DATETIME',
				'null'           => true,
			]
		]);
		$this->forge->addKey('id_status', true);
		$this->forge->createTable('log_status');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('log_status');
	}
}
