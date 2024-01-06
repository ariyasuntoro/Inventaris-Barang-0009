<?php

namespace App\Controllers;

use App\Controllers\BaseControllers;
use App\Models\ModelBarang;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;

class Barang extends BaseController
{
    public function __construct()
    {
        $this->ModelBarang = new ModelBarang();
        $this->ModelKategori = new ModelKategori();
        $this->ModelSatuan = new ModelSatuan();
        
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Barang',
            'menu' => 'masterdata',
            'submenu' => 'barang',
            'page' => 'v_barang',
            'barang' => $this->ModelBarang->AllData(),
            'kategori' =>  $this->ModelKategori->AllData(),
            'satuan' => $this->ModelSatuan->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'kode_barang' => [
                'label' => 'Kode Barang / Barcode',
                'rules' => 'is_unique[tbl_barang.kode_barang]',
                'errors' => [
                    'is_unique' => '{field} Sudah Ada, Masukkan Kode Lain !!',
                ]
            ],
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                ]
            ],
            'id_kategori' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                ]
            ]

        ])){
            $hargabarang = str_replace(",","", $this->request->getPost('harga_barang'));
            $data = [
                'kode_barang'  => $this->request->getPost('kode_barang'),
                'nama_barang'  => $this->request->getPost('nama_barang'),
                'merk'  => $this->request->getPost('merk'),
                'id_kategori'  => $this->request->getPost('id_kategori'),
                'id_satuan'  => $this->request->getPost('id_satuan'),    
                'harga_barang' => $hargabarang,   
                'stok' => $this->request->getPost('stok'),    
            ];
            $this->ModelBarang->InsertData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan');
            return redirect()->to(base_url('Barang'));
        }else{
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Barang'))->withInput('validation',\Config\Services::validation());
        }
    }
    public function UpdateData($id_barang)
    {
        if ($this->validate([
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                ]
            ],
            'id_kategori' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                ]
            ]

        ])){
            $hargabarang = str_replace(",","", $this->request->getPost('harga_barang'));
            $data = [
                'id_barang' => $id_barang,
                'nama_barang'  => $this->request->getPost('nama_barang'),
                'merk'  => $this->request->getPost('merk'),
                'id_kategori'  => $this->request->getPost('id_kategori'),
                'id_satuan'  => $this->request->getPost('id_satuan'),    
                'harga_barang' => $hargabarang,  
                'stok' => $this->request->getPost('stok'),    
            ];
            $this->ModelBarang->UpdateData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
            return redirect()->to(base_url('Barang'));
        }else{
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Barang'))->withInput('validation',\Config\Services::validation());
        }
    }
    public function DeleteData($id_barang)
    {
        $data = [
            'id_barang' => $id_barang,
        ];
        $this->ModelBarang->DeleteData($data);
        session()->setFlashdata('pesan','Data Berhasil DiHapus');
        return redirect()->to('Barang');
    }
}
