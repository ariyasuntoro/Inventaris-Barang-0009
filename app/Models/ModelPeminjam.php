<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeminjam extends Model
{
    public function NoPeminjam()
    {
       $tgl = date('Ymd');
       $query = $this->db->query("SELECT MAX(RIGHT(no_peminjam,4)) as no_urut from tbl_pinjam where DATE (tgl_pinjam)='$tgl'");
       $hasil = $query->getRowArray();
       if ($hasil['no_urut'] > 0) {
        $tmp = $hasil['no_urut'] + 1;
        $kd = sprintf("%04s", $tmp);
       }else {
        $kd = "001";
       }
       $no_peminjam = date('Ymd') . $kd;
       return $no_peminjam;
    }
    public function CekBarang($kode_barang)
    {
        return $this->db->table('tbl_barang')
        ->join('tbl_kategori','tbl_kategori.id_kategori=tbl_barang.id_kategori')
        ->join('tbl_satuan','tbl_satuan.id_satuan=tbl_barang.id_satuan')
        ->where('kode_barang', $kode_barang)
        ->get()->getRowArray();
    }

    public function AllBarang()
    {
        return $this->db->table('tbl_barang')
        ->join('tbl_kategori','tbl_kategori.id_kategori=tbl_barang.id_kategori')
        ->join('tbl_satuan','tbl_satuan.id_satuan=tbl_barang.id_satuan')
        ->where('stok > 0')
        ->get()->getResultArray();
    }

    public function InsertPinjam($data)
    {
        $this->db->table('tbl_pinjam')->insert($data);
    }

    public function InsertBarangKeluar($data)
    {
        $this->db->table('tbl_barang_keluar')->insert($data);
    }
    public function InsertBarang($data)
    {
        $this->db->table('tbl_barang')->insert($data);
    }
}
   // public function getMaxStock($kode_barang) 
   // {
    //    $query = $this->db->query("SELECT stok FROM tbl_barang WHERE id_barang = ?", [$ko]);
    //    $result = $query->getRow();

     //   if ($result){
           // return $result->stok;
      //  }else{
        //    return 0;
       // }
   // }
 


