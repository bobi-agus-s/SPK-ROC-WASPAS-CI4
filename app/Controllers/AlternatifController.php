<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\Penduduk;
use App\Models\Relasi;

class AlternatifController extends ResourcePresenter
{
    public function __construct()
    {
        $this->alternatif = new Alternatif();
        $this->penilaian = new Penilaian();
        $this->penduduk = new Penduduk();
        $this->relasi = new Relasi();
    }
   
    public function index()
    {
        $data = [
            'title'             => 'Alternatif',
            'page'              => 'alternatif',
            'alternatif'        => $this->alternatif->findAllData(),
            'penduduk'          => $this->relasi->findAllData(),
        ];

        return view('spk/alternatif/index', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();

        if ($this->alternatif->insert($data)) {
            return redirect()->back()->with('success', 'Berhasil menambah data');
        } else {
            return redirect()->back()->withInput()->with('error', $this->alternatif->errors());
        }
    }

    public function edit($id = null)
    {
        $data = [
            'title'         => 'Alternatif',
            'page'          => 'alternatif',
            'alternatif'    => $this->alternatif->find($id)
        ];

        return view('spk/alternatif/edit', $data);
    }

   
    public function update($id = null)
    {
        $data = $this->request->getPost();

        if ($this->alternatif->update($id, $data)) {
            return redirect()->to(site_url('alternatif'))->with('success' ,'Data berhasil diubah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->alternatif->errors());
        }
    }

    public function delete($id_alternatif = null, $id_penduduk = null, $id_periode = null)
    {
        $this->alternatif->delete($id_alternatif);
        $this->penilaian->where('id_alternatif', $id_alternatif)->delete();
        $this->relasi->set('status_pengajuan', 0)->where(
            [
                'id_penduduk' => $id_penduduk, 
                'id_periode' => $id_periode, 
            ]
        )->update();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function truncate()
    {
        $this->alternatif->truncate();
        $this->penilaian->truncate();

        return redirect()->back()->with('success', 'semua data berhasil dihapus');
    }

    public function pengajuan()
    {
        $data = $this->request->getPost();
        $id_relasi = $data['id_relasi'];
        $data['status_pengajuan'] = 1;

        unset($data['id_relasi']);
        
        $this->alternatif->insert($data);

        $this->relasi->set('status_pengajuan', 1)->where('id_relasi', $id_relasi)->update();
        return redirect()->to(site_url('alternatif'))->with('success' ,'berhasil diajukan');
    }
}
