<?php

namespace App\Controllers;

use App\Controllers\BaseControllers;
use App\Models\ModelBarangMasuk;
use App\Models\ModelBarang;


class Barangmasuk extends BaseController
{
    public function __construct()
    {
        $this->ModelBarangMasuk = new ModelBarangMasuk();
        $this->ModelBarang = new ModelBarang();
        
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Barang Masuk',
            'menu' => 'masterdata',
            'submenu' => 'barangmasuk',
            'page' => 'v_barang_masuk',
            'barangmasuk' => $this->ModelBarangMasuk->AllData(),
            'barang' => $this->ModelBarang->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'id_barang' => [
                'label' => 'Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                ]
            ]

        ])){
            $tgl_diterima = $this->request->getPost('tgl_diterima');
            $data = [
                'tgl_diterima'  =>  $tgl_diterima,
                'id_barang'  => $this->request->getPost('id_barang'),
                'jumlah' => $this->request->getPost('jumlah'),  
                'keterangan' => $this->request->getPost('keterangan'),    
                'kondisi' => $this->request->getPost('kondisi'),  
            ];
            $this->ModelBarangMasuk->InsertData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to(base_url('Barangmasuk'));
        }else{
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Barangmasuk'))->withInput('validation',\Config\Services::validation());
        }
    }
    public function UpdateData($id_barang_masuk)
    {
        if ($this->validate([
            'id_barang' => [
                'label' => 'Barang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                ]
            ]

        ])){
            $data = [
                'id_barang_masuk' => $id_barang_masuk,
                'tgl_diterima'  =>  date('Y-m-d'),
                'id_barang'  => $this->request->getPost('id_barang'),   
                'jumlah' => $this->request->getPost('jumlah'),  
                'keterangan' => $this->request->getPost('keterangan'),  
                'kondisi' => $this->request->getPost('kondisi'),    
            ];
            $this->ModelBarangMasuk->UpdateData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
            return redirect()->to(base_url('Barangmasuk'));
        }else{
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Barangmasuk'))->withInput('validation',\Config\Services::validation());
        }
    }
    public function DeleteData($id_barang_masuk)
    {
        $data = [
            'id_barang_masuk' => $id_barang_masuk,
        ];
        $this->ModelBarangMasuk->DeleteData($data);
        session()->setFlashdata('pesan','Data Berhasil DiHapus');
        return redirect()->to('Barangmasuk');
    }
}
