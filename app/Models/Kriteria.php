<?php

namespace App\Models;

use CodeIgniter\Model;

class Kriteria extends Model
{
    protected $table            = 'kriteria';
    protected $primaryKey       = 'id_kriteria';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_periode', 'kode_kriteria', 'nama_kriteria', 'jenis_kriteria', 'prioritas', 'bobot'];

    protected $validationRules = [
        'kode_kriteria'     => 'required',
        'nama_kriteria'     => 'required',
        'prioritas'         => 'required|numeric',
    ];
    protected $validationMessages = [
        'kode_kriteria' => [
            'required'  => 'Kode kriteria tidak boleh kosong',
        ],
        'nama_kriteria' => [
            'required'  => 'Nama kriteria tidak boleh kosong',
        ],
        'prioritas'     => [
            'required' => 'prioritas tidak boleh kosong',
            'numeric'  => 'Inputan harus berupa angka',
        ]
    ];

    public function updateBobot($kriteria = null, $bobot = 0)
    {
        return $this->db->table($this->table)
                        ->set('bobot', $bobot)
                        ->where('id_kriteria', $kriteria)
                        ->update();
    }

    public function findByPeriode()
    {
        return $this->db->table($this->table)->where('id_periode', session('id_periode'))->get()->getResult();
    }

}
