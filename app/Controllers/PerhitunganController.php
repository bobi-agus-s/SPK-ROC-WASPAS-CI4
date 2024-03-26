<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\Perhitungan;

class PerhitunganController extends BaseController
{

    public function __construct() 
    {
        helper('custom');

        $this->kriteria = new Kriteria();    
        $this->alternatif = new Alternatif();    
        $this->penilaian = new Penilaian();   
        $this->perhitungan = new Perhitungan();    

        $this->hasil();
    }

    public function index()
    {
        $data = [
            'title'             => 'Perhitungan',
            'page'              => 'perhitungan',
            'kriteria'          => $this->kriteria->where('id_periode', session('id_periode'))->findAll(),
            'alternatif'        => $this->alternatif->findAllData(),
            'model_penilaian'   => $this->penilaian,
            'model_perhitungan' => $this->perhitungan,
        ];


        return view('spk/perhitungan/index', $data);
    }
 

    public function hasil()
    {
        $this->perhitungan->resetHasil();

        //  ============ keterangan ============
        // x   = matrik keputusan
        // w   = bobot kriteria
        // r = normalisasi matrik
        // Q   = kepentingan relatif

        $alternatif = $this->alternatif->where('id_periode', session('id_periode'))->findAll();
        $kriteria   = $this->kriteria->where('id_periode', session('id_periode'))->findAll();

        foreach ($alternatif as $dt_alternatif) {
            if ($this->penilaian->cekObject($dt_alternatif->id_alternatif)) {
                $total = 0;
                $subtotal_wsm = 0;
                $subtotal_wpm = 1;

                foreach ($kriteria as $dt_kriteria) {
                    $w = $dt_kriteria->bobot;
                    $max = $this->perhitungan->max($dt_kriteria->id_kriteria)->nilai;
                    $min = $this->perhitungan->min($dt_kriteria->id_kriteria)->nilai;
                    // mengambil matrix keputusan
                    $x = $this->perhitungan->matrix_keputusan($dt_alternatif->id_alternatif, $dt_kriteria->id_kriteria)->nilai;
                    // normalisasi
                    if ($dt_kriteria->jenis_kriteria == "benefit") {
                        $r = $x / $max;
                    } else {
                        $r = $min / $x;
                    }

                    // perhitungan WSM
                    $wsm = $r * $w;
                    $subtotal_wsm += $wsm;

                    // perhitungan WPM
                    $wpm = pow($r, $w);
                    $subtotal_wpm *= $wpm;
                    
                }

                // nilai keputusan relatif Q
                $total = 0.5*$subtotal_wsm + 0.5*$subtotal_wpm;
                $this->perhitungan->insertHasil($dt_alternatif->id_alternatif, $total);   
            }
        }

        $data = [
            'title'             => 'Hasil Akhir Perangkingan',
            'page'              => 'hasil',
            'hasil'             => $this->perhitungan->hasil()
        ];

        return view('spk/hasil/index', $data);
    }

}
