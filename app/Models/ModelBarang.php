<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarang extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_barang')
        ->join('tbl_kategori','tbl_kategori.id_kategori=tbl_barang.id_kategori')
        ->join('tbl_satuan','tbl_satuan.id_satuan=tbl_barang.id_satuan')
        ->orderBy('id_barang','DESC')
        ->get()->getResultArray();
    }
    public function InsertData($data)
    {
    $this->db->table('tbl_barang')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_barang')
        ->where('id_barang',$data['id_barang'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_barang')
        ->where('id_barang',$data['id_barang'])
        ->delete($data);
    }

    
}