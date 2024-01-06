<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelStatus extends Model
{
    
    public function alldata()
    {
        return $this->db->table('tbl_barang_keluar')
        ->join('tbl_barang','tbl_barang.kode_barang=tbl_barang_keluar.kode_barang')
        ->orderBy('id_barang_keluar','DESC')
        ->get()->getresultArray();
    }

    
}