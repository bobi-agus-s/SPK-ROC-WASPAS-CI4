<?php

namespace App\Controllers\konfigurasi;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\User;

class UserController extends ResourcePresenter
{

    public function __construct()
    {
        $this->user = new User();
    }
   
    public function index()
    {
        $data = [
            'title'     =>  'Data User',
            'page'      =>  'user',
            'user'     =>  $this->user->orderBy('user_level', 'ASC')->findAll(),
        ];

        return view('konfigurasi/index', $data);
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
            if ($data['id_user'] != $user->id_user) {
                return redirect()->back()->with('err_user_found', 'username sudah digunakan, gunakan username lain');
            }
        }

        if ($this->user->update($id, $data)) {
            return redirect()->back()->with('success' ,'Data berhasil diubah');
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

    public function profil()
    {
        $data = [
            'title'     =>  'Profil',
            'page'      =>  'profil',
        ];

        return view('konfigurasi/profil', $data);
 
    }

    public function profilUpdate($id = null)
    {
        $data = $this->request->getPost();
        
        $user = $this->user->where('username', $data['username'])->first();

        if (is_object($user)) {
            if ($data['id_user'] != $user->id_user) {
                return redirect()->back()->with('err_user_found', 'username sudah digunakan, gunakan username lain');
            }
        }

        if ($this->user->update($id, $data)) {
            return redirect()->to(site_url('user/profil'))->with('success' ,'Data berhasil diubah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->user->errors());
        }
    }
}
