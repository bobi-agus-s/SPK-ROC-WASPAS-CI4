<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\Agama;

class AgamaController extends ResourcePresenter
{

    public function __construct()
    {
        $this->agama = new Agama();
    }
   
    public function index()
    {
        $data = [
            'title'     =>  'Agama',
            'page'      =>  'agama',
            'agama'     =>  $this->agama->findAll(),
        ];

        return view('master/agama/index', $data);
    }

   
    public function show($id = null)
    {
        //
    }

   
    public function new()
    {
        //
    }

   
    public function create()
    {
        $data = $this->request->getPost();

        if ($this->agama->insert($data)) {
            return redirect()->back()->with('success', 'data berhasil ditambah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->agama->errors());
        }
    }

  
    public function edit($id = null)
    {
        $data = $this->agama->find($id);

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

        if ($this->agama->update($id, $data)) {
            return redirect()->to(site_url('agama'))->with('success' ,'Data berhasil diubah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->agama->errors());
        }
    }

   
    public function remove($id = null)
    {
        //
    }

   
    public function delete($id = null)
    {
        $this->agama->delete($id);
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function truncate()
    {
        $this->agama->truncate();
        return redirect()->back()->with('success', 'semua data berhasil dihapus');
    }
}
