<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }
    public function index()
    {
        $data = [
            'judul' => 'SISTEM INFORMASI INVENTARIS BARANG SMP NEGERI 5 COMAL',
            'subjudul' => '',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_admin',
            'jml_barang' => $this->ModelAdmin->JumlahBarang(),
            'jml_kategori' => $this->ModelAdmin->JumlahKategori(),
            'jml_satuan' => $this->ModelAdmin->JumlahSatuan(),
            'jml_user' => $this->ModelAdmin->JumlahUser(),

        ];
        return view('v_template', $data);
    }

    public function Setting()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => 'Setting',
            'menu' => 'setting',
            'submenu' => '',
            'page' => 'v_setting',
            'setting' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data); 
    }

    public function UpdateSetting()
    {
        $data = [
            'id' => '1',
            'nama_sekolah'=> $this->request->getPost('nama_sekolah'),
            'slogan'=> $this->request->getPost('slogan'),
            'alamat'=> $this->request->getPost('alamat'),
            'no_hp'=> $this->request->getPost('no_hp'),
            'deskripsi'=> $this->request->getPost('deskripsi'),
        ];
        $this->ModelAdmin->UpdateData($data);
        session()->setFlashdata('pesan','Data Berhasil DiEdit');
        return redirect()->to('Admin/Setting');
    }

    
}