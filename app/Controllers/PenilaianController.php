<?php

namespace App\Controllers;

use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Subkriteria; 
use App\Models\Penilaian;
use App\Models\Dusun;

class PenilaianController extends BaseController
{
    public function __construct()
    {
        $this->alternatif = new Alternatif();
        $this->kriteria = new Kriteria();
        $this->subkriteria = new Subkriteria();
        $this->penilaian = new Penilaian();
        $this->dusun = new Dusun();
    }

    public function input($id = null)
    {
        $data = [
            'title'             => 'Penilaian',
            'page'              => 'penilaian',
            'alternatif'        => $this->alternatif->findDataById($id),
            'dusun'             => $this->dusun->findAll(),
            'kriteria'          => $this->kriteria->findByPeriode(),
            'model_subkriteria' => $this->subkriteria,
        ];

        return view('spk/penilaian/input', $data);
    }


    public function save()
    {
        $data = $this->request->getPost();

        for ($i = 0; $i < count($data['id_kriteria']); ++$i) {
            $this->penilaian->insertData($data['id_alternatif'], $data['id_kriteria'][$i], $data['id_subkriteria'][$i]);
        }

        // update sttaus penilaian di tabel alternatif
        $this->alternatif->set('status_penilaian', 1)->where('id_alternatif', $data['id_alternatif'])->update();

        return redirect()->to(site_url('alternatif'))->with('success', 'Berhasil melakukan penilaian');
    }


    public function edit($id = null)
    {
        $data = [
            'title'             => 'Ubah Penilaian',
            'page'              => 'penilaian',
            'alternatif'        => $this->alternatif->findDataById($id),
            'dusun'             => $this->dusun->findAll(),
            'kriteria'          => $this->kriteria->findByPeriode(),
            'model_subkriteria' => $this->subkriteria,
            'model_penilaian'   => $this->penilaian,
        ];

        return view('spk/penilaian/edit', $data);
    }

    public function update()
    {
        $data = $this->request->getPost();
        for ($i = 0; $i < count($data['id_kriteria']); $i++) {
            $this->penilaian->updateData($data['id_alternatif'], $data['id_kriteria'][$i], $data['id_subkriteria'][$i]);
        }
        return redirect()->to(site_url('alternatif'))->with('success', 'Berhasil merubah penilaian');
    }

    public function show($id = null)
    {
        $data = [
            'title'             => 'Lihat Penilaian',
            'page'              => 'penilaian',
            'alternatif'        => $this->alternatif->findDataById($id),
            'dusun'             => $this->dusun->findAll(),
            'kriteria'          => $this->kriteria->findAll(),
            'model_subkriteria' => $this->subkriteria,
            'model_penilaian'   => $this->penilaian,
        ];

        return view('spk/penilaian/show', $data);
    }

}
