<?php

namespace App\Models;

use CodeIgniter\Model;

class Alternatif extends Model
{
    protected $table            = 'alternatif';
    protected $primaryKey       = 'id_alternatif';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_periode', 'id_penduduk', 'status_penilaian', 'status_pengajuan'];

    public function findAllData()
    {
        return $this->db->table($this->table)
                        ->select('alternatif.*')
                        ->select('penduduk.nik')
                        ->select('penduduk.nama_penduduk')
                        ->join('penduduk', 'penduduk.id_penduduk = alternatif.id_penduduk')
                        ->where('id_periode', session('id_periode'))
                        ->orderBy('alternatif.id_alternatif', 'ASC')
                        ->get()
                        ->getResult();
    }

    public function findDataById($id)
    {
        return $this->db->table($this->table)
                        ->select('alternatif.*')
                        ->select('penduduk.*')
                        ->join('penduduk', 'penduduk.id_penduduk = alternatif.id_penduduk')
                        ->where('id_alternatif', $id)
                        ->orderBy('alternatif.id_alternatif', 'ASC')
                        ->get()
                        ->getRow();
    }
}
