<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRinci extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_barang_keluar')
        ->join('tbl_barang','tbl_barang.kode_barang=tbl_barang_keluar.kode_barang')
        ->orderBy('id_barang_keluar','DESC')
        ->get()->getresultArray();
    }

    public function InsertData($data)
    {
    $this->db->table('tbl_barang_keluar')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_barang_keluar')
        ->where('id_barang_keluar',$data['id_barang_keluar'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_barang_keluar')
        ->where('id_barang_keluar',$data['id_barang_keluar'])
        ->delete($data);
    }

    public function update_keterangan($id_barang_keluar, $keterangan)
    {
        $this->db->set('keterangan', $keterangan);
        $this->db->where('id_barang_keluar', $id_barang_keluar);
        $this->db->update('tbl_barang_keluar');
    }
}