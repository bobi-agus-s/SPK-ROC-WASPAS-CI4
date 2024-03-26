<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agama extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_agama'   => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_agama'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ]
        ]);
        $this->forge->addKey('id_agama', true);
        $this->forge->createTable('agama');
    }

    public function down()
    {
        $this->forge->dropTable('agama');
    }
}
