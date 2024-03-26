<?php

namespace App\Models;

use CodeIgniter\Model;

class Penilaian extends Model
{
    protected $table            = 'penilaian';
    protected $primaryKey       = 'id_penilaian';
    protected $returnType       = 'object';
    protected $allowedFields    = ['id_periode', 'id_alternatif', 'id_kriteria', 'id_sub_kriteria'];

    public function insertData($alternatif, $kriteria, $subkriteria)
    {
        $data = [
            'id_alternatif'     =>  $alternatif,
            'id_kriteria'       =>  $kriteria,
            'id_subkriteria'    =>  $subkriteria
        ];

        return $this->db->table($this->table)->insert($data);
    }

    public function updateData($alternatif, $kriteria, $subkriteria)
    {
        return $this->db->table($this->table)
                        ->set('id_subkriteria', $subkriteria)
                        ->where(
                            [
                                'id_alternatif'     => $alternatif,
                                'id_kriteria'       => $kriteria
                            ])
                        ->update();
    }

    public function cekObject($id_alternatif = null)
    {
        $object = $this->db->table($this->table)->where('id_alternatif', $id_alternatif)->get()->getNumRows();
        if ($object > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getPenilaian($alternatif, $kriteria)
    {
        return $this->db->table($this->table)->where(['id_alternatif' => $alternatif,'id_kriteria' => $kriteria,])->get()->getRow();
    }

    public function resetAlternatif($subkriteria)
    {
        return $this->db->table($this->table)
                        ->where('id_subkriteria', $subkriteria)
                        ->get()->getResult();
    }

// ----------------
    public function getPenilaianByAlternatifGroup()
    {
        return $this->db->table($this->table)->select('id_alternatif')->groupBy('id_alternatif')->get()->getResult();
    }
    public function insert_kriteria_subkriteria($alternatif, $kriteria, $subkriteria)
    {
        $data = [
            'id_alternatif'     =>  $alternatif,
            'id_kriteria'       =>  $kriteria,
            'id_subkriteria'    =>  $subkriteria
        ];

        return $this->db->table($this->table)->insert($data);
    }
// ---------------
}
