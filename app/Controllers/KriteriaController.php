<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use App\Models\Penilaian;
use App\Models\Periode;

use Dompdf\Dompdf;

class KriteriaController extends ResourcePresenter
{

    public function __construct()
    {

        $this->kriteria = new Kriteria();
        $this->subkriteria = new SubKriteria();
        $this->penilaian = new Penilaian();
        $this->periode = new Periode();
    }

    public function index()
    {
        $data = [
            'title'     => 'Kriteria',
            'page'      => 'kriteria',
            'kriteria'  => $this->kriteria->where('id_periode', session('id_periode'))->findAll(),
            'periode'   => $this->periode->findAll()
        ];

        return view('spk/kriteria/index', $data);
    }
 
    public function create()
    {
        $data = $this->request->getPost();
        $data['kode_kriteria'] = 'C';
        $data['kode_kriteria'] .= $data['prioritas'];
        $data['bobot'] = '0';
        $data['id_periode'] = session('id_periode');

        $save = $this->kriteria->insert($data);

        if (!$save) {
            return redirect()->back()->withInput()->with('error', $this->kriteria->errors());            
        } else {
            // generate bobot otomatis
            $this->otomatisGenerateBobot(session('id_periode'));
            return redirect()->back()->with('success', 'Berhasil menambah data');
        }
    }

    
    public function edit($id = null)
    {
        $data = [
            'title' => 'Ubah Kriteria',
            'page'  => 'kriteria',
            'kriteria'  => $this->kriteria->find($id)
        ];

        return view('spk/kriteria/edit', $data);
    }

    
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $data['kode_kriteria'] = 'C';
        $data['kode_kriteria'] .= $data['prioritas'];

        $update = $this->kriteria->update($id, $data);

        if (!$update) {
            return redirect()->back()->withInput()->with('error', $this->kriteria->errors());            
        } else {
            // generate bobot otomatis
            $this->otomatisGenerateBobot(session('id_periode'));
            return redirect()->to(site_url('kriteria'))->with('success' ,'Data berhasil diubah');
        }
    }

    public function delete($id = null, $id_periode = null)
    {
        $this->kriteria->delete($id);
        $this->subkriteria->where('id_kriteria', $id)->delete();
        $this->penilaian->where('id_kriteria', $id)->delete();

        // generate bobot otomatis
        $this->otomatisGenerateBobot($id_periode);
        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function truncate()
    {
        $this->kriteria->truncate();
        $this->subkriteria->truncate();
        $this->penilaian->truncate();

        return redirect()->to(site_url('kriteria'))->with('success', 'semua data berhasil dihapus');
    }

    // ---------------- metode ROC (Rank Order Centroid) -------------------
    public function otomatisGenerateBobot($id_periode = null)
    {
        $kriteria   = $this->kriteria->where('id_periode', $id_periode)->orderBy('prioritas', 'ASC')->findAll();
        $jumlah     = count($kriteria);

        for ($i = 1; $i < $jumlah+1; ++$i) {
            $hitung = 0;
            for ($j = $i; $j < $jumlah+1; ++$j) {
                $hitung += 1/$j;
            }
            $bobot = round($hitung/$jumlah, 9);

            $this->kriteria->updateBobot($kriteria[$i-1]->id_kriteria, $bobot);
        }
        return true;
    }
    // ---------------------------------------------------------------------

    public function generateBobot($id_periode = null)
    {
        $kriteria   = $this->kriteria->where('id_periode', $id_periode)->orderBy('prioritas', 'ASC')->findAll();
        $jumlah     = count($kriteria);

        for ($i = 1; $i < $jumlah+1; ++$i) {
            $hitung = 0;
            for ($j = $i; $j < $jumlah+1; ++$j) {
                $hitung += 1/$j;
            }
            $bobot = round($hitung/$jumlah, 9);

            $this->kriteria->updateBobot($kriteria[$i-1]->id_kriteria, $bobot);
        }

        return redirect()->back()->with('success', 'bobot berhasil digenerate');
    }

    public function print()
    {
        $data = [
            'title'     => 'Kriteria',
            'page'      => 'kriteria',
            'kriteria'  => $this->kriteria->where('id_periode', session('id_periode'))->findAll(),
            'model_subkriteria'   => $this->subkriteria,
        ];

        return view('spk/kriteria/print', $data);
    }

    public function cetak()
    {
        $data = [
            'title'     => 'Kriteria',
            'page'      => 'kriteria',
            'kriteria'  => $this->kriteria->where('id_periode', session('id_periode'))->findAll(),
            'model_subkriteria'   => $this->subkriteria,
        ];

        $dompdf = new Dompdf();
        $html = view('spk/kriteria/print', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream("kriteria.pdf", array('Attachment' => FALSE));
    }

}


