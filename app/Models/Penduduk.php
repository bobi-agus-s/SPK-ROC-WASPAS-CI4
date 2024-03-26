<?php

namespace App\Models;

use CodeIgniter\Model;

class Penduduk extends Model
{
    protected $table            = 'penduduk';
    protected $primaryKey       = 'id_penduduk';
    protected $returnType       = 'object';
    protected $allowedFields    =   [
                                        'nama_penduduk','id_agama', 'id_dusun', 'no_kk','nik',
                                        'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'rt', 'rw'
                                    ];

    protected $validationRules = [
        'no_kk'         => 'required|numeric',
        'nik'           => 'required|numeric',
        'nama_penduduk' => 'required',
        'tempat_lahir'  => 'required',
        'rt'           => 'required|numeric',
        'rw'            => 'required|numeric',
    ];

    protected $validationMessages = [
        'no_kk'  => [
            'required'  => 'kolom tidak boleh kosong',
            'numeric'   => 'inputan harus angka'
        ],
        'nik'  => [
            'required'  => 'kolom tidak boleh kosong',
            'numeric'   => 'inputan harus angka'
        ],
        'nama_penduduk'  => [
            'required'  => 'kolom tidak boleh kosong'
        ],
        'tempat_lahir'  => [
            'required'  => 'kolom tidak boleh kosong'
        ],
        'rt'  => [
            'required'  => 'kolom tidak boleh kosong',
            'numeric'   => 'inputan harus angka'
        ],
        'rw'  => [
            'required'  => 'kolom tidak boleh kosong',
            'numeric'   => 'inputan harus angka'
        ],
    ];

    public function findAllData()
    {
        $builder = $this->db->table($this->table)
                            ->join('agama', 'agama.id_agama = penduduk.id_agama', 'left')
                            ->join('dusun', 'dusun.id_dusun = penduduk.id_dusun', 'left')
                            ->orderBy('id_penduduk', 'desc');
        return $builder->get()->getResult();
    }

    public function filterData($data)
    {
        $builder = $this->db->table($this->table)
                            ->join('agama', 'agama.id_agama = penduduk.id_agama', 'left')
                            ->join('dusun', 'dusun.id_dusun = penduduk.id_dusun', 'left')
                            ->like('jenis_kelamin', $data['jenis_kelamin'])
                            ->like('tempat_lahir', $data['tempat_lahir'])
                            ->like('penduduk.id_agama', $data['id_agama'])
                            ->like('penduduk.id_dusun', $data['id_dusun'])
                            ->like('rt', $data['rt'])
                            ->like('rw', $data['rw'])
                            ->orderBy('id_penduduk', 'desc');
        return $builder->get()->getResult();
    }

    public function find_tempat_lahir()
    {
        return $this->db->table('penduduk')->select('tempat_lahir')->groupBy('tempat_lahir')->get()->getResult();
    }
}
