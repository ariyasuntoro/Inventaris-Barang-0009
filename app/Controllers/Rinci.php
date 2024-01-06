<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelRinci;
use App\Models\ModelBarang;


class Rinci extends BaseController
{
    public function __construct()
    {
        $this->ModelRinci = new ModelRinci();
        $this->ModelBarang = new ModelBarang();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Barang Keluar',
            'menu' => 'masterdata',
            'submenu' => 'rinci',
            'page' => 'v_rinci',
            'rinci' => $this->ModelRinci->AllData(),
            'barang' => $this->ModelBarang->AllData(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $this->ModelRinci->InsertData($data);
        session()->setFlashdata('pesan','Data Berhasil Ditambahkan');
        return redirect()->to('Rinci');
    }

    public function UpdateData($id_barang_keluar)
    {
        $komentar = $this->request->getPost('komentar');
        $data = [
            'id_barang_keluar' => $id_barang_keluar,
            'status'=> $this->request->getPost('status'),
            'keterangan'=> $this->request->getPost('keterangan'),
            'komentar'  => $komentar,
        ];
        $this->ModelRinci->UpdateData($data);
        session()->setFlashdata('pesan','Data Berhasil DiEdit');
        return redirect()->to('Rinci');
    }

    public function DeleteData($id_barang_keluar)
    {
        $data = [
            'id_barang_keluar' => $id_barang_keluar,
        ];
        $this->ModelRinci->DeleteData($data);
        session()->setFlashdata('pesan','Data Berhasil DiHapus');
        return redirect()->to('Rinci');
    }

    public function SimpanKembali()
    {
        $cart = \Config\Services::cart();
        $barang = $cart->contents();
        foreach ($barang as $key => $value) {
            $data = [
                'kode_barang' => $value['id'],
                'stok' => $value['stok'],
                
            ];
            $this->ModelPeminjam->InsertBarang($data);
        }

    }
    
}