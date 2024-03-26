<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dusun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dusun'   => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_dusun'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('id_dusun', true);
        $this->forge->createTable('dusun');
    }

    public function down()
    {
        $this->forge->dropTable('dusun');
    }
}
