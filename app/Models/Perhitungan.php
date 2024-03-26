<?php

namespace App\Models;

use CodeIgniter\Model;

class Perhitungan extends Model
{
    protected $table            = 'penilaian';
    protected $primaryKey       = 'id_penilaian';
    protected $returnType       = 'object';

    public function tabel_penilaian($alternatif = null, $kriteria = null)
    {
        $builder = $this->db->table($this->table)
                            ->select('sub_kriteria.deskripsi as deskripsi')
                            ->join('sub_kriteria', 'sub_kriteria.id_subkriteria = penilaian.id_subkriteria')
                            ->where([
                                'id_alternatif' => $alternatif,
                                'penilaian.id_kriteria'   => $kriteria
                            ]);
 
        return $builder->get()->getRow();
    }

    public function matrix_keputusan($alternatif = null, $kriteria = null)
    {
        $builder = $this->db->table($this->table)
                            ->select('sub_kriteria.nilai as nilai')
                            ->join('sub_kriteria', 'sub_kriteria.id_subkriteria = penilaian.id_subkriteria')
                            ->where([
                                'id_alternatif' => $alternatif,
                                'penilaian.id_kriteria'   => $kriteria
                            ]);
 
        return $builder->get()->getRow();
    }

    public function total_bobot()
    {
        return $this->db->table('kriteria')->selectSum('bobot')->where('id_periode', session('id_periode'))->get()->getRow();
    }

    public function max($kriteria = null)
    {
        $builder = $this->db->table($this->table)
                            ->selectMax('sub_kriteria.nilai')
                            ->join('sub_kriteria', 'sub_kriteria.id_subkriteria = penilaian.id_subkriteria')
                            ->where('penilaian.id_kriteria', $kriteria);

        return $builder->get()->getRow();
    }

    public function min($kriteria = null)
    {
        $builder = $this->db->table($this->table)
                            ->selectMin('sub_kriteria.nilai')
                            ->join('sub_kriteria', 'sub_kriteria.id_subkriteria = penilaian.id_subkriteria')
                            ->where('penilaian.id_kriteria', $kriteria);
        return $builder->get()->getRow();
    }

    
    // hasil rangking

    public function resetHasil()
    {
        return $this->db->table('hasil')->truncate();
    }

    public function insertHasil($alternatif, $total)
    {
        $data = [
            'id_alternatif' => $alternatif,
            'hasil'         => $total
        ];
        return $this->db->table('hasil')->insert($data);
    }


    public function hasil($dusun = null)
    {
        if (empty($dusun)) {
            return $this->db->table('hasil')
                        ->select('hasil.*')
                        ->select('alternatif.id_alternatif')
                        ->select('penduduk.nama_penduduk')
                        ->join('alternatif', 'alternatif.id_alternatif = hasil.id_alternatif')
                        ->join('penduduk', 'penduduk.id_penduduk = alternatif.id_penduduk')
                        ->orderBy('hasil', 'DESC')
                        ->where('alternatif.id_periode', session('id_periode'))
                        ->get()->getResult();
        } else {
            return $this->db->table('hasil')
                        ->select('hasil.*')
                        ->select('alternatif.id_alternatif')
                        ->select('penduduk.nama_penduduk')
                        ->join('alternatif', 'alternatif.id_alternatif = hasil.id_alternatif')
                        ->join('penduduk', 'penduduk.id_penduduk = alternatif.id_penduduk')
                        ->orderBy('hasil', 'DESC')
                        ->where([
                            'penduduk.id_dusun' => $dusun,
                            'alternatif.id_periode' => session('id_periode')
                        ])
                        ->get()->getResult();
        }
        
    }

}
