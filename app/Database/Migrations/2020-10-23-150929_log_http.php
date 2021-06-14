<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Log_http extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_http'         => [
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
		$this->forge->addKey('id_http', true);
		$this->forge->createTable('log_http');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('log_http');
	}
}
