<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\Periode;
use App\Models\Penduduk;

use App\Models\Relasi;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\Penilaian;


class PeriodeController extends ResourcePresenter
{
    public function __construct()
    {
        $this->periode      = new Periode();
        $this->penduduk     = new Penduduk();

        $this->relasi       = new Relasi();
        $this->alternatif   = new Alternatif();
        $this->kriteria     = new Kriteria();
        $this->penilaian    = new Penilaian();
    }
   
    public function index()
    {
        $data = [
            'title'     =>  'Periode',
            'page'      =>  'periode',
            'periode'     =>  $this->periode->findAll(),
        ];

        return view('spk/periode/index', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();
        $penduduk = $this->penduduk->select('id_penduduk')->select('id_dusun')->findAll();

        if ($this->periode->insert($data)) {

            $id_periode = $this->periode->select('id_periode')->orderBy('id_periode', 'desc')->first();

            foreach ($penduduk as $dt) {
                $this->relasi->insertData($id_periode->id_periode, $dt->id_penduduk, $dt->id_dusun, 0);
            }

            return redirect()->back()->with('success', 'data berhasil ditambah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->periode->errors());
        }
    }

  
    public function edit($id = null)
    {
        $data = $this->periode->find($id);

        if ($data) {
            echo json_encode([
                'status'    => true,
                'data'      => $data
            ]);
        } else {
            echo json_encode([
                'status'    => false,
            ]);
        }
    }

    public function update($id = null)
    {
        $data = $this->request->getPost();

        if ($this->periode->update($id, $data)) {
            return redirect()->to(site_url('periode'))->with('success' ,'Data berhasil diubah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->periode->errors());
        }
    }

    public function delete($id = null)
    {
        if (session('id_periode') == $id) {
            return redirect()->back()->with('err_periode', 'Tidak dapat menghapus periode yang dipilih saat ini');
        }

        $this->periode->delete($id);

        $this->relasi->where('id_periode', $id)->delete();
        $this->alternatif->where('id_periode', $id)->delete();
        $this->kriteria->where('id_periode', $id)->delete();
        $this->penilaian->where('id_periode', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

}
