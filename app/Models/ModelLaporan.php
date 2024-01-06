<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
    public function DataHarian($tgl)
    {
        return $this->db->table('tbl_barang_keluar')
        ->join('tbl_barang','tbl_barang.kode_barang=tbl_barang_keluar.kode_barang')
        ->join('tbl_pinjam','tbl_pinjam.no_peminjam=tbl_barang_keluar.no_peminjam')
        ->where('tbl_pinjam.tgl_pinjam', $tgl)
        ->select('tbl_pinjam.nama_user')
        ->select('tbl_pinjam.tgl_kembali')
        ->select('tbl_barang_keluar.nama')
        ->select('tbl_barang_keluar.kode_barang')
        ->select('tbl_barang_keluar.tgl_kembali')
        ->select('tbl_barang.nama_barang')
        ->select('tbl_barang_keluar.merk')
        ->groupBy('tbl_barang_keluar.kode_barang')
        ->select('tbl_barang_keluar.qty')
        ->get()->getresultArray();
    }

    public function DataBulanan($bulan, $tahun)
    {
        return $this->db->table('tbl_barang_keluar')
        ->join('tbl_pinjam','tbl_pinjam.no_peminjam=tbl_barang_keluar.no_peminjam')
        ->where('month(tbl_pinjam.tgl_pinjam)', $bulan)
        ->where('year(tbl_pinjam.tgl_pinjam)', $tahun)
        ->select('tbl_pinjam.tgl_pinjam')
        ->select('tbl_pinjam.nama_user')
        ->select('tbl_pinjam.tgl_kembali')
        ->select('tbl_barang_keluar.kode_barang')
        ->select('tbl_barang_keluar.nama')
        ->select('tbl_barang_keluar.merk')
        ->select('tbl_barang_keluar.tgl_kembali')
        ->groupBy('tbl_barang_keluar.kode_barang')
        ->select('tbl_barang_keluar.qty')
        ->get()->getresultArray();
    }

    public function DataTahunan($tahun)
    {
        return $this->db->table('tbl_barang_keluar')
        ->join('tbl_pinjam','tbl_pinjam.no_peminjam=tbl_barang_keluar.no_peminjam')
        ->where('year(tbl_pinjam.tgl_pinjam)', $tahun)
        ->select('tbl_pinjam.nama_user')
        ->select('tbl_pinjam.tgl_kembali')
        ->select('tbl_barang_keluar.kode_barang')
        ->select('tbl_barang_keluar.nama')
        ->select('tbl_barang_keluar.merk')
        ->groupBy('tbl_barang_keluar.kode_barang')
        ->select('tbl_barang_keluar.qty')
        ->get()->getresultArray();
    }
}
