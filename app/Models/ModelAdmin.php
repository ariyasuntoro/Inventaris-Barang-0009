<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function DetailData()
    {
        return $this->db->table('tbl_setting')->where('id','1')->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_setting')
        ->where('id',$data['id'])
        ->update($data);
    }
    
    public function Grafik()
    {
        return $this->db->table('tbl_rinci_pinjam')
        ->join('tbl_pinjam','tbl_pinjam.no_peminjam=tbl_rinci_pinjam.no_peminjam')
        ->where('month(tbl_pinjam.tgl_pinjam)', date('m'))
        ->where('year(tbl_pinjam.tgl_pinjam)', date('Y'))
        ->select('tbl_pinjam.tgl_pinjam')
        ->groupBy('tbl_pinjam.tgl_pinjam')
        //->selectSum('tbl_rinci_pinjam.total_harga')
        ->get()->getresultArray();
    }

    public function LaporanHariIni()
    {
        return $this->db->table('tbl_rinci_pinjam')
        ->join('tbl_pinjam','tbl_pinjam.no_peminjam=tbl_rinci_pinjam.no_peminjam')
        ->where('tbl_pinjam.tgl_pinjam', date('Y-m-d'))
        ->groupBy('tbl_pinjam.tgl_pinjam')
        //->selectSum('tbl_rinci_pinjam.total_harga')
        ->get()->getRowArray();
    }

    public function PendapatanBulanIni()
    {
        return $this->db->table('tbl_rinci_pinjam')
        ->join('tbl_pinjam','tbl_pinjam.no_peminjam=tbl_rinci_pinjam.no_peminjam')
        ->where('month(tbl_pinjam.tgl_pinjam)', date('m'))
        ->where('year(tbl_pinjam.tgl_pinjam)', date('Y'))
        ->groupBy('month(tbl_pinjam.tgl_pinjam)')
       // ->selectSum('tbl_rinci_pinjam.total_harga')
        ->get()->getRowArray();
    }

    public function PendapatanTahunIni()
    {
        return $this->db->table('tbl_rinci_pinjam')
        ->join('tbl_pinjam','tbl_pinjam.no_peminjam=tbl_rinci_pinjam.no_peminjam')
        ->where('year(tbl_pinjam.tgl_pinjam)', date('Y'))
        ->groupBy('year(tbl_pinjam.tgl_pinjam)')
       // ->selectSum('tbl_rinci_pinjam.total_harga')
        ->get()->getRowArray();
    }

    public function JumlahBarang()
    {
        return $this->db->table('tbl_barang')->countAll();
    }

    public function JumlahKategori()
    {
        return $this->db->table('tbl_kategori')->countAll();
    }

    public function JumlahSatuan()
    {
        return $this->db->table('tbl_satuan')->countAll();
    }

    public function JumlahUser()
    {
        return $this->db->table('tbl_user')->countAll();
    }
}