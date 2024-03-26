<?php

namespace App\Models;

use CodeIgniter\Model;

class Relasi extends Model
{
    protected $table            = 'relasi';
    protected $primaryKey       = 'id_relasi';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_periode', 'id_penduduk', 'id_dusun', 'status_pengajuan'];

    public function insertData($id_periode, $id_penduduk, $id_dusun, $status_pengajuan)
    {
        $data = [
            'id_periode'    => $id_periode,
            'id_penduduk'    => $id_penduduk,
            'id_dusun'    => $id_dusun,
            'status_pengajuan'    => $status_pengajuan
        ];

        return $this->db->table($this->table)->insert($data);
    }

    public function findAllData()
    {
        $builder = $this->db->table($this->table)
                            ->select('id_relasi')
                            ->select('id_periode')
                            ->select('status_pengajuan')
                            ->select('penduduk.nik')
                            ->select('penduduk.id_penduduk')
                            ->select('penduduk.nama_penduduk')
                            ->select('penduduk.rt')
                            ->select('penduduk.rw')
                            ->select('dusun.nama_dusun')
                            ->join('penduduk', 'penduduk.id_penduduk = relasi.id_penduduk')
                            ->join('dusun', 'dusun.id_dusun = relasi.id_dusun', 'left')
                            ->where([
                                'id_periode' => session('id_periode'),
                                'status_pengajuan'  => 0
                            ])
                            ->orderBy('penduduk.id_penduduk', 'desc');
        return $builder->get()->getResult();
    }

}
