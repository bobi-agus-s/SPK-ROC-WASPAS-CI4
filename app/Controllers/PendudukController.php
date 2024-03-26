<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourcePresenter;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\Penduduk;
use App\Models\Alternatif;
use App\Models\Penilaian;
use App\Models\Agama;
use App\Models\Dusun;
use App\Models\Relasi;
use App\Models\Periode;

class PendudukController extends ResourcePresenter
{

    public function __construct()
    {
        helper('custom_helper');

        $this->penduduk = new Penduduk();
        $this->alternatif = new Alternatif();
        $this->penilaian  = new Penilaian();
        $this->agama      = new Agama();
        $this->dusun      = new Dusun();
        $this->relasi      = new Relasi();
        $this->periode      = new Periode();
    }
   
    public function index()
    {
        $data = [
            'title'     =>  'Penduduk',
            'page'      =>  'penduduk',
            'penduduk'  =>  $this->penduduk->findAllData(),
            'agama'     =>  $this->agama->findAll(),
            'dusun'     =>  $this->dusun->findAll(),
            'tempat_lahir'  => $this->penduduk->find_tempat_lahir()
        ];

        return view('master/penduduk/index', $data);
    }

   
    public function create()
    {
        $data = $this->request->getPost();
        $periode = $this->periode->findAll();

        if ($this->penduduk->insert($data)) {
            
            $penduduk = $this->penduduk->select('id_penduduk')->orderBy('id_penduduk', 'desc')->first();
            foreach ($periode as $dt_periode) {
                $this->relasi->insertData($dt_periode->id_periode, $penduduk->id_penduduk, $data['id_dusun'], 0);
            }

            return redirect()->back()->with('success', 'data berhasil ditambah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->penduduk->errors());
        }
    }
  
    public function edit($id = null)
    {
        $data = [
            'title'     =>  'Edit Penduduk',
            'page'      =>  'penduduk',
            'penduduk'  =>  $this->penduduk->find($id),
            'agama'     =>  $this->agama->findAll(),
            'dusun'     =>  $this->dusun->findAll(),
        ];

        return view('master/penduduk/edit', $data);
    }

   
    public function update($id = null)
    {
        $data = $this->request->getPost();

        if ($this->penduduk->update($id, $data)) {
            return redirect()->to(site_url('penduduk'))->with('success' ,'Data berhasil diubah');
        } else {
            return redirect()->back()->withInput()->with('error', $this->penduduk->errors());
        }
    }

   
    public function delete($id = null)
    {
        $this->penduduk->delete($id);
        
        $this->alternatif->where('id_penduduk', $id)->delete();
        $this->penilaian->where('id_penduduk', $id)->delete();
        $this->relasi->where('id_penduduk', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }

    public function truncate()
    {
        $this->penduduk->truncate();
        $this->alternatif->truncate();
        $this->penilaian->truncate();

        return redirect()->back()->with('success', 'semua data berhasil dihapus');
    }

    public function pengajuan($id = null, $status_pengajuan = null)
    {
        $this->penduduk->set('status_pengajuan', $status_pengajuan)->where('id_penduduk', $id)->update();

        $data['id_alternatif']  = $id;
        $data['id_penduduk']    = $id;

        if ($status_pengajuan == 1) {
            $this->alternatif->insert($data);
            return redirect()->back()->with('success', 'berhasil diajukan');
        } else {
            $this->alternatif->where('id_penduduk', $id)->delete();
            $this->penilaian->where('id_alternatif', $id)->delete();

            return redirect()->back();
        }
    }

    public function filter()
    {
        $data = $this->request->getPost();
        
        $data = [
            'title'     =>  'Penduduk',
            'page'      =>  'penduduk',
            'penduduk'  =>  $this->penduduk->filterData($data),
            'agama'     =>  $this->agama->findAll(),
            'dusun'     =>  $this->dusun->findAll(),
            'tempat_lahir'  => $this->penduduk->find_tempat_lahir()
        ];

        $params = [
            'penduduk_filter'   => $data['penduduk']
        ];
        session()->set($params);

        return view('master/penduduk/filter', $data);
    }

    public function exportExcel($filter = null)
    {
        
        if (empty($filter)) {
            $penduduk = $this->penduduk->findAllData();
        } else {
            $penduduk = session('penduduk_filter');
        }

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'NO KK')
                    ->setCellValue('B1', 'NIK')
                    ->setCellValue('C1', 'Nama')
                    ->setCellValue('D1', 'Jenis Kelamin')
                    ->setCellValue('E1', 'Tempat Lahir')
                    ->setCellValue('F1', 'Tanggal Lahir')
                    ->setCellValue('G1', 'Agama')
                    ->setCellValue('H1', 'Dusun')
                    ->setCellValue('I1', 'RT')
                    ->setCellValue('J1', 'RW');
        
        $column = 2;
        // tulis data penduduuk ke cell
        foreach($penduduk as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $column, $data->no_kk)
                        ->setCellValue('B' . $column, $data->nik)
                        ->setCellValue('C' . $column, $data->nama_penduduk)
                        ->setCellValue('D' . $column, $data->jenis_kelamin)
                        ->setCellValue('E' . $column, $data->tempat_lahir)
                        ->setCellValue('F' . $column, $data->tgl_lahir)
                        ->setCellValue('G' . $column, $data->nama_agama)
                        ->setCellValue('H' . $column, $data->nama_dusun)
                        ->setCellValue('I' . $column, $data->rt)
                        ->setCellValue('J' . $column, $data->rw);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Penduduk';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename='.$fileName.'.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

        // destroy session
        $params = ['penduduk_filter'];
        session()->remove($params);
    }
}
