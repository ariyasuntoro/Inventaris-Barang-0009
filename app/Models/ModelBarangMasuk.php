<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangMasuk extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_barang_masuk')
        ->join('tbl_barang','tbl_barang.id_barang=tbl_barang_masuk.id_barang')
        ->orderBy('id_barang_masuk','DESC')
        ->get()->getResultArray();
    }
    public function InsertData($data)
    {
    $this->db->table('tbl_barang_masuk')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_barang_masuk')
        ->where('id_barang_masuk',$data['id_barang_masuk'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_barang_masuk')
        ->where('id_barang_masuk',$data['id_barang_masuk'])
        ->delete($data);
    }
}