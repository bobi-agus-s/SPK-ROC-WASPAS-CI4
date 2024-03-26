<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_subkriteria' => 1,
                'id_kriteria'    => 1,
                'deskripsi'    => '< 2015',
                'nilai'    => '1',
            ],
            [
                'id_subkriteria' => 2,
                'id_kriteria'    => 1,
                'deskripsi'    => '>= 2015 dan < 2017 ',
                'nilai'    => '2',
            ],
            [
                'id_subkriteria' => 3,
                'id_kriteria'    => 1,
                'deskripsi'    => '>= 2017 dan < 2019',
                'nilai'    => '3',
            ],
            [
                'id_subkriteria' => 4,
                'id_kriteria'    => 1,
                'deskripsi'    => '>= 2020',
                'nilai'    => '4',
            ],
            [
                'id_subkriteria' => 5,
                'id_kriteria'    => 2,
                'deskripsi'    => '0 Item / tidak ada',
                'nilai'    => '4',
            ],
            [
                'id_subkriteria' => 6,
                'id_kriteria'    => 2,
                'deskripsi'    => '1 Item',
                'nilai'    => '3',
            ],
            [
                'id_subkriteria' => 7,
                'id_kriteria'    => 2,
                'deskripsi'    => '2 Item',
                'nilai'    => '2',
            ],
            [
                'id_subkriteria' => 8,
                'id_kriteria'    => 2,
                'deskripsi'    => '>= 3 Item',
                'nilai'    => '1',
            ],
            [
                'id_subkriteria' => 9,
                'id_kriteria'    => 3,
                'deskripsi'    => '< 1 Item',
                'nilai'    => '1',
            ],
            [
                'id_subkriteria' => 10,
                'id_kriteria'    => 3,
                'deskripsi'    => '2 Item',
                'nilai'    => '2',
            ],
            [
                'id_subkriteria' => 11,
                'id_kriteria'    => 3,
                'deskripsi'    => '3 Item',
                'nilai'    => '3',
            ],
            [
                'id_subkriteria' => 12,
                'id_kriteria'    => 3,
                'deskripsi'    => '>= 4 Item',
                'nilai'    => '4',
            ],
            [
                'id_subkriteria' => 13,
                'id_kriteria'    => 4,
                'deskripsi'    => '0 Item / tidak ada',
                'nilai'    => '1',
            ],
            [
                'id_subkriteria' => 14,
                'id_kriteria'    => 4,
                'deskripsi'    => '1 Item',
                'nilai'    => '2',
            ],
            [
                'id_subkriteria' => 15,
                'id_kriteria'    => 4,
                'deskripsi'    => '2 Item',
                'nilai'    => '3',
            ],
            [
                'id_subkriteria' => 16,
                'id_kriteria'    => 4,
                'deskripsi'    => '3 Item',
                'nilai'    => '4',
            ],
            [
                'id_subkriteria' => 17,
                'id_kriteria'    => 5,
                'deskripsi'    => '<= Rp. 9.999.999',
                'nilai'    => '4',
            ],
            [
                'id_subkriteria' => 18,
                'id_kriteria'    => 5,
                'deskripsi'    => '>= Rp. 10.000.000 - <=14.900.000',
                'nilai'    => '3',
            ],
            [
                'id_subkriteria' => 19,
                'id_kriteria'    => 5,
                'deskripsi'    => '>= Rp. 15.000.000 - <=19.900.000',
                'nilai'    => '2',
            ],
            [
                'id_subkriteria' => 20,
                'id_kriteria'    => 5,
                'deskripsi'    => '>= Rp. 20.000.000',
                'nilai'    => '1',
            ],
        ];

        // Using Query Builder
        $this->db->table('sub_kriteria')->insertBatch($data);

    }
}
