<?php

namespace App\Controllers;

use App\Models\Perhitungan;
use App\Models\Dusun;
use App\Models\Periode;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;

class Home extends BaseController
{
    public function __construct()
    {
        helper('custom');
        
        $this->perhitungan = new Perhitungan();
        $this->dusun = new Dusun();
        $this->periode = new Periode();

        $this->kriteria = new Kriteria();    
        $this->alternatif = new Alternatif();    
        $this->penilaian = new Penilaian();   

    }

    public function index()
    {
        // if (!session('id_user')) {
        //     return redirect()->to(site_url('auth/login'));
        // }
        if (!session('id_periode')) {
            $periode = $this->periode->orderBy('periode', 'desc')->first();
            $params = [
                'id_periode'    => $periode->id_periode,
                'periode'       => $periode->periode,
            ];
            session()->set($params);
        }

        $this->hasil();

        $data = [
            'title' => 'Dashboard',
            'page'  => 'dashboard',
            'dusun' => $this->dusun->findAll(),
            'hasil' => $this->perhitungan->hasil()
        ];
        return view('home', $data);
    }

    function banjarejo()
    {
        $data = $this->perhitungan->hasil(1);
        echo json_encode($data);
    }
    function mekarsari()
    {
        $data = $this->perhitungan->hasil(3);
        echo json_encode($data);
    }
    function krajan()
    {
        $data = $this->perhitungan->hasil(4);
        echo json_encode($data);
    }
    function mulyosari()
    {
        $data = $this->perhitungan->hasil(5);
        echo json_encode($data);
    }
    function margodadi()
    {
        $data = $this->perhitungan->hasil(6);
        echo json_encode($data);
    }
    function mekarindah()
    {
        $data = $this->perhitungan->hasil(7);
        echo json_encode($data);
    }
    function wadah()
    {
        $data = $this->perhitungan->hasil(8);
        echo json_encode($data);
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
