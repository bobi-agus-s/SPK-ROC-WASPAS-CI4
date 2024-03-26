<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kriteria' => 1,
                'kode_kriteria'    => 'C1',
                'nama_kriteria'    => 'Tahun Kendaraan',
                'jenis_kriteria'    => 'benefit',
                'bobot'    => '10'
            ],
            [
                'id_kriteria' => 2,
                'kode_kriteria'    => 'C2',
                'nama_kriteria'    => 'Kekurangan',
                'jenis_kriteria'    => 'cost',
                'bobot'    => '20'
            ],
            [
                'id_kriteria' => 3,
                'kode_kriteria'    => 'C3',
                'nama_kriteria'    => 'Kelebihan',
                'jenis_kriteria'    => 'benefit',
                'bobot'    => '20'
            ],
            [
                'id_kriteria' => 4,
                'kode_kriteria'    => 'C4',
                'nama_kriteria'    => 'Kelengkapan Surat',
                'jenis_kriteria'    => 'benefit',
                'bobot'    => '25'
            ],
            [
                'id_kriteria' => 5,
                'kode_kriteria'    => 'C5',
                'nama_kriteria'    => 'harga Penawaran',
                'jenis_kriteria'    => 'cost',
                'bobot'    => '25'
            ],
        ];

        // Using Query Builder
        $this->db->table('kriteria')->insertBatch($data);

    }
}
