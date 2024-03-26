<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penduduk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penduduk'   => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_agama' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'id_dusun' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'no_kk'         => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'nik'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'unique'         => true,
            ],
            'nama_penduduk' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'jenis_kelamin' => [
                'type'       => 'ENUM',
                'constraint' => ['L', 'P'],
                'default'    => 'L',
            ],
            'tempat_lahir' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'tgl_lahir' => [
                'type'           => 'DATE',
            ],
            'status_pengajuan' => [
                'type'           => 'INT',
                'constraint'     => '1',
                'default'        => '0',
            ],
            'rt'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
            'rw'           => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
            ],
        ]);
        $this->forge->addKey('id_penduduk', true);
        $this->forge->createTable('penduduk');
    }

    public function down()
    {
        $this->forge->dropTable('penduduk');
    }
}
