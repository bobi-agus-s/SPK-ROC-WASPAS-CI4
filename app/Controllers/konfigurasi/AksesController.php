<?php

namespace App\Controllers\konfigurasi;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\Akses;

class AksesController extends ResourcePresenter
{

    public function __construct()
    {
        $this->akses = new Akses();
    }
   
    public function index()
    {
        $data = [
            'title'     => 'Hak Akses',
            'page'      => 'akses',
            // 'akses'     => $this->akses->join('akses_menu', 'akses_menu.id_menu = akses_submenu.id_menu')->orderBy('akses_menu.id_menu', 'ASC')->findAll(),
            // 'menu'      => $this->akses->menu(),
            // 'model_submenu' => $this->akses
            // 'submenu'     => $this->akses->findAll(),
        ];

        return view('konfigurasi/akses_static', $data);
    }

   
    public function show($id = null)
    {
        //
    }

   
    public function new()
    {
        //
    }


    public function simpan()
    {
        $data = $this->request->getPost();
        dd($data);

        if (is_object($this->user->where('username', $data['username'])->first())) {
            return redirect()->back()->with('err_user_found', 'username sudah digunakan, gunakan username lain');
        }

        if ($this->user->insert($data)) {
            return redirect()->back()->with('success', 'data berhasil ditambah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->user->errors());
        }
    }


   
    public function create()
    {
        $data = $this->request->getPost();

        if (is_object($this->user->where('username', $data['username'])->first())) {
            return redirect()->back()->with('err_user_found', 'username sudah digunakan, gunakan username lain');
        }

        if ($this->user->insert($data)) {
            return redirect()->back()->with('success', 'data berhasil ditambah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->user->errors());
        }
    }

  
    public function edit($id = null)
    {
        $data = $this->user->find($id);

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

        $user = $this->user->where('username', $data['username'])->first();

           

        if (is_object($user)) {
            return redirect()->back()->with('err_user_found', 'username sudah digunakan, gunakan username lain');
        }

        if ($this->user->update($id, $data)) {
            return redirect()->to(site_url('user'))->with('success' ,'Data berhasil diubah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->user->errors());
        }
    }

   
    public function remove($id = null)
    {
        //
    }

   
    public function delete($id = null)
    {
        $this->user->delete($id);
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function truncate()
    {
        $this->user->truncate();
        return redirect()->back()->with('success', 'semua data berhasil dihapus');
    }
}
