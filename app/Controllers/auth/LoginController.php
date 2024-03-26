<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

use App\Models\Login;
use App\Models\User;
use App\Models\Periode;

class LoginController extends BaseController
{

    public function __construct()
    {
        $this->login = new Login;
        $this->user = new User;
        $this->periode = new Periode;
    }

    public function index()
    {
        if (session('login_info')) {
            return redirect()->to(site_url('/'));
        }

        return view('auth/login');
    }

    function validasi_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $this->user->where('username', $username)->first();
        $periode = $this->periode->orderBy('periode', 'desc')->first();

        if (!is_object($user)) {
            return redirect()->to(site_url('auth/login'))->with('error', 'username tidak ditemukan');
        }

        if ($user->password != $password) {
            return redirect()->back()->with('error', 'password yang anda masukkan salah');
        }

        $params = [
            'login_info'    => true,
            'id_user'     => $user->id_user,
            'user_level'    => $user->user_level,
            'id_periode'    => $periode->id_periode,
            'periode'    => $periode->periode,
        ];

        if ($user->user_level == 'admin') {
            session()->set($params);
            return redirect()->to(site_url('/'));
        } else if ($user->user_level == 'kasi_kesejahteraan') {
            session()->set($params);
            return redirect()->to(site_url('/'));
        } else {
            session()->set($params);
            return redirect()->to(site_url('/'));
        }
    }

    public function logout()
    {
        $params = ['login_info', 'id_user', 'user_level', 'id_periode', 'periode'];
        session()->remove($params);
        return redirect()->to(site_url('auth/login'));
    }
}
