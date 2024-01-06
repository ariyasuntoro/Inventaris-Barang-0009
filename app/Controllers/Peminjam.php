<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPeminjam;
use App\Models\ModelStatus;
use App\Models\ModelBarang;

class Peminjam extends BaseController
{
    public function __construct()
    {
        $this->ModelPeminjam = new ModelPeminjam();
        $this->ModelStatus = new ModelStatus();
        $this->ModelBarang = new ModelBarang();
    }
    public function index()
    {
        $cart = \Config\Services::cart();
        $data = [
            'judul' => 'Peminjam',
            'no_peminjam' => $this->ModelPeminjam->NoPeminjam(),
            'cart' => $cart->contents(),
            'subjudul' => 'Lihat Status Peminjaman Barang',
            'submenu' => 'peminjam',
            'page' => 'v_peminjam',
            'barang' => $this->ModelPeminjam->AllBarang(),
            'status' => $this->ModelStatus->AllData(),
        ];
        return view('v_peminjam', $data);
    }
    public function CekBarang()
    {
       
        $kode_barang = $this->request->getPost('kode_barang');
        $barang = $this->ModelPeminjam->CekBarang($kode_barang);
        if ($barang == null) {
            $data = [
                'nama_barang' => '',
                'merk' => '',
                'nama_kategori' => '',
                'nama_satuan' => '',
                'stok' => '',

            ];
        } else {
            $data = [
                'nama_barang' => $barang['nama_barang'],
                'merk' => $barang['merk'],
                'nama_kategori' => $barang['nama_kategori'],
                'nama_satuan' => $barang['nama_satuan'],
                'stok' => $barang['stok'],

            ];
        }
        echo json_encode($data);
    }

    public function InsertCart()
    {
        $cart = \Config\Services::cart();

        // Insert an array of values
        $cart->insert(array(
        'id'      => $this->request->getPost('kode_barang'),
        'qty'     => $this->request->getPost('qty'),
        'name'    => $this->request->getPost('nama_barang'),
        'brand'    => $this->request->getPost('merk'),
        'options' => array(
            'nama_kategori' => $this->request->getPost('nama_kategori'), 
            'nama_satuan' => $this->request->getPost('nama_satuan'),  
        )
        ));
        
        return redirect()->to(base_url('Peminjam'));
        
    }
    public function ViewCart()
    {
        $cart = \Config\Services::cart();
        $data = $cart->contents();

        dd($data);
    }

    public function get_stokB(){
        $kode_barang = $this->input->get('kode_barang');
        $stok_barang = $this->db->query("SELECT stok FROM tbl_barang WHERE kode_barang='$kode_barang'");
        foreach($stok_barang->result() as $stock){
            echo '<td><input type="number" style="width: 40px;"
            class="form-control" name="stock" id="stock" max="'.$stock->stok.'"
            min="1" onchange="set_jumlah()" /></td><td> Jumlah Stok : '.$stock->stok.'</td>';
        }
    }

    public function ResetCart()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url('Peminjam'));
    }

    public function RemoveItemCart($rowid)
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('Peminjam'));
    }


    
    public function SimpanTransaksi()
    {
        $cart = \Config\Services::cart();
        $barang = $cart->contents();
        $no_peminjam = $this->ModelPeminjam->NoPeminjam();
        $catatan = str_replace(",","", $this->request->getPost('catatan'));
        $tgl_kembali = $this->request->getPost('tgl_kembali');
        $jam_kembali = $this->request->getPost('jam_kembali');
        foreach ($barang as $key => $value) {
            $data = [
                'no_peminjam' => $no_peminjam,
                'nama_user' => session()->get('nama_user'),
                'kode_barang' => $value['id'],
                'nama' => $value['name'],
                'merk' => $value['brand'],
                'tgl_pinjam' => date('Y-m-d'),
                'tgl_kembali'  =>  $tgl_kembali,
                'jam_kembali'  =>  $jam_kembali,
                'qty' => $value['qty'],
                
            ];
            $this->ModelPeminjam->InsertBarangKeluar($data);
        }

        $data = [
            'no_peminjam' => $no_peminjam,
            'tgl_pinjam' => date('Y-m-d'),
            'jam' => date('H:i:s'),
            'catatan' => $catatan,
            'tgl_kembali' => $tgl_kembali,
            'jam_kembali' => $jam_kembali,
            'id_user' => session()->get('id_user'),
            'nama_user' => session()->get('nama_user'),
        ];
        $this->ModelPeminjam->InsertPinjam($data);
        $cart->destroy();
        session()->setFlashdata('pesan','Transaksi Berhasil Disimpan');
        return redirect()->to('Peminjam');

    }

}


