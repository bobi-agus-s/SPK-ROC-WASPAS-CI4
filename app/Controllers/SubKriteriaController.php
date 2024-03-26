<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Penilaian;

use App\Models\Alternatif;

class SubKriteriaController extends ResourcePresenter
{
    
    public function __construct()
    {
        $this->kriteria = new Kriteria();
        $this->subkriteria = new SubKriteria();
        $this->penilaian = new Penilaian();

        $this->alternatif = new Alternatif();
    }

    public function index()
    {

    }

    
    public function show($id = null)
    {
        $data = [
            'title' => 'Sub Kriteria',
            'page' => 'subkriteria',
            'kriteria' => $this->kriteria->find($id),
            'subkriteria' => $this->subkriteria->getDataByKriteria($id),
        ];

        return view('spk/subkriteria/show', $data);
    }

    
    public function new()
    {
        //
    }

    
    public function create()
    {
        $data = $this->request->getPost();
        $save = $this->subkriteria->insert($data);

        if (!$save) {
            return redirect()->back()->withInput()->with('error', $this->subkriteria->errors());
        } else {
            if (count($this->subkriteria->getDataByKriteria($data['id_kriteria'])) == 1) {
                // dapatkan id subkriteria terbaru
                $sub = $this->subkriteria->getNewSubkriteria($data['id_kriteria'])->id_subkriteria;
                // dapatkan semua alternatif pada table penilaian
                $alt = $this->penilaian->getPenilaianByAlternatifGroup();
                foreach ($alt as $dt_alt) {
                    // insert data kriteria dan subkriteria terbaru otomatis
                    $this->penilaian->insert_kriteria_subkriteria($dt_alt->id_alternatif, $data['id_kriteria'], $sub);
                }
            }

            return redirect()->back()->with('success', 'Berhasil menambah data');
        }
    }

    
    public function edit($id = null)
    {

        $data = [
            'title' => 'Ubah Sub Kriteria',
            'page'  => 'Ubah Sub kriteria',
            'subkriteria'  => $this->subkriteria->find($id)
        ];

        return view('spk/subkriteria/edit', $data);
    }

    
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $update = $this->subkriteria->update($id, $data);

        if (!$update) {
            return redirect()->back()->withInput()->with('error', $this->subkriteria->errors());
        } else {
            return redirect()->back()->with('success', 'Berhasil merubah data');
        }
    }

    
    public function remove($id = null)
    {
        //
    }

    
    public function delete($id = null)
    {
        $this->subkriteria->delete($id);

        $alternatif = $this->penilaian->resetAlternatif($id);

        $this->penilaian->where('id_subkriteria', $id)->delete();

        foreach ($alternatif as $dt_alternatif) {
            $this->penilaian->where('id_alternatif', $dt_alternatif->id_alternatif)->delete();
        } 

        return redirect()->back()->with('success', 'berhasil menghapus data');
    }
}
