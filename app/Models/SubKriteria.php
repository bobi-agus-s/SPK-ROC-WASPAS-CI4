<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKriteria extends Model
{
    protected $table            = 'sub_kriteria';
    protected $primaryKey       = 'id_subkriteria';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_kriteria', 'deskripsi', 'nilai'];

    protected $validationRules = [
        'deskripsi'     => 'required',
        'nilai'             => 'required|numeric'
    ];

    protected $validationMessages = [
        'deskripsi' => [
            'required' => 'deskripsi tidak boleh kosong',
        ],
        'nilai'         => [
            'required' => 'nilai tidak boleh kosong',
            'numeric' => 'Inputan harus berupa angka',
        ]
    ];

    public function getDataByKriteria($id_kriteria)
    {
        $builder = $this->db->table($this->table)
                            ->where('id_kriteria', $id_kriteria);
        return $builder->get()->getResult();
    }

    public function getNewSubkriteria($id_kriteria)
    {
        $builder = $this->db->table($this->table)
                            ->select('id_subkriteria')
                            ->where('id_kriteria', $id_kriteria)
                            ->orderBy('id_subkriteria' ,'desc');
        return $builder->get()->getRow();
    }
}
