<?php
namespace App\Controllers\konfigurasi;

use App\Controllers\BaseController;

use App\Models\Periode;

class SettingPeriodeController extends BaseController
{
    public function __construct()
    {
        $this->periode = new Periode();
    }

    public function index()
    {
        $data = [
            'title' => 'Setting Periode',
            'page'  => 'settting periode',
            'periode' => $this->periode->findAll()
        ];

        return view('konfigurasi/set_periode', $data);
    }

    public function setPeriode()
    {
        $data = $this->request->getPost();
        $periode = $this->periode->where('id_periode', $data['id_periode'])->get()->getRow();
        $params = [
            'id_periode' => $periode->id_periode,
            'periode' => $periode->periode
        ];

        session()->set($params);

        return redirect()->back()->with('success', 'setting periode ' .session('periode'). ' berhasil');
    }
}
