<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user'   => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_user'   => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'username'   => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'password'   => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'user_level'   => [
                'type'          => 'ENUM',
                'constraint'    => ['administrator', 'kasi_kesejahteraan', 'user'],
                'default'       => 'user'
            ],
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('user');
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
