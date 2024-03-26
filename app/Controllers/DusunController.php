<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\Dusun;
use App\Models\Perhitungan;
use App\Models\Penduduk;

class DusunController extends ResourcePresenter
{

    public function __construct()
    {
        $this->dusun = new Dusun();
        $this->perhitungan = new Perhitungan();
        $this->penduduk = new Penduduk();
    }
   
    public function index()
    {
        $data = [
            'title'     =>  'Dusun',
            'page'      =>  'dusun',
            'dusun'     =>  $this->dusun->findAll(),
        ];

        return view('master/dusun/index', $data);
    }

    public function create()
    {
        $data = $this->request->getPost();

        if ($this->dusun->insert($data)) {
            return redirect()->back()->with('success', 'data berhasil ditambah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->dusun->errors());
        }
    }

  
    public function edit($id = null)
    {
        $data = $this->dusun->find($id);

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

        if ($this->dusun->update($id, $data)) {
            return redirect()->to(site_url('dusun'))->with('success' ,'Data berhasil diubah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->dusun->errors());
        }
    }
   
    public function delete($id = null)
    {
        $this->dusun->delete($id);
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function truncate()
    {
        $this->dusun->truncate();
        return redirect()->back()->with('success', 'semua data berhasil dihapus');
    }

    // kirim data json
    public function getDusun()
    {
        $data = $this->dusun->findAll();
        echo json_encode($data);
    }

    public function totalDusun($id)
    {
        $data = $this->penduduk->selectCount('nik')
                                ->join('dusun', 'dusun.id_dusun = penduduk.id_dusun')
                                ->where('penduduk.id_dusun', $id)
                                ->get()->getResult();
        echo json_encode($data);
    }
}
