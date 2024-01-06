<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelStatus;
use App\Models\ModelBarang;
use App\Models\ModelPeminjam;


class Status extends BaseController
{
    public function __construct()
    {
        $this->ModelStatus = new ModelStatus();
        $this->ModelPeminjam = new ModelPeminjam();
        $this->ModelBarang = new ModelBarang();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Lihat Status',
            'menu' => 'masterdata',
            'submenu' => 'status',
            'status' => $this->ModelStatus->AllData(),
            'barang' => $this->ModelBarang->AllData(),
            
        ];
        return view('v_peminjam', $data);
    }

    
    }

    
