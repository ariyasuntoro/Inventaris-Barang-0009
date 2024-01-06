<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBarang;
use App\Models\ModelBarangMasuk;
use App\Models\ModelAdmin;
use App\Models\ModelRinci;
use App\Models\ModelLaporan;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->ModelBarang = new ModelBarang();
        $this->ModelBarangMasuk = new ModelBarangMasuk();
        $this->ModelRinci = new ModelRinci();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelLaporan = new ModelLaporan();
        
    }
    public function PrintDataBarang()
    {
        $data = [
            'judul' => 'Laporan Data Barang',
            'barang' =>  $this->ModelBarang->AllData(),
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'laporan/v_print_lap_barang'
        ];
        return view('laporan/v_template_print_laporan', $data);
    }

    public function PrintDataBarangMasuk()
    {
        $data = [
            'judul' => 'Laporan Data Barang Masuk',
            'barangmasuk' =>  $this->ModelBarangMasuk->AllData(),
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'laporan/v_print_lap_barang_msk'
        ];
        return view('laporan/v_template_print_laporan', $data);
    }

    public function PrintDataBarangKeluar()
    {
        $data = [
            'judul' => 'Laporan Data Barang Keluar',
            'rinci' =>  $this->ModelRinci->AllData(),
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'laporan/v_print_lap_barang_klr'
        ];
        return view('laporan/v_template_print_laporan', $data);
    }

    public function LaporanHarian()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Harian',
            'menu' => 'laporan',
            'submenu' => 'laporan-harian',
            'page' => 'laporan/v_laporan_harian',
            'web' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanHarian()
    {
        $tgl = $this->request->getPost('tgl');
        $data = [
            'judul' => 'Laporan Harian ',
            'dataharian' => $this->ModelLaporan->DataHarian($tgl),
            'web' => $this->ModelAdmin->DetailData(),
            'tgl' => $tgl,
        ];

        $response = [
            'data' => view('laporan/v_tabel_laporan_harian', $data)
        ];

        echo json_encode($response);
        //echo dd($this->ModelLaporan->DataHarian($tgl));
    }

    public function PrintLaporanHarian($tgl)
    {
        $data = [
            'judul' => 'Laporan Harian Peminjam',
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'laporan/v_print_lap_harian',
            'dataharian' => $this->ModelLaporan->DataHarian($tgl),
            'tgl' => $tgl,
        ];
        return view('laporan/v_template_print_laporan', $data);
    }

    public function LaporanBulanan()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Bulanan',
            'menu' => 'laporan',
            'submenu' => 'laporan-bulanan',
            'page' => 'laporan/v_laporan_bulanan',
            'web' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanBulanan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'judul' => 'Laporan Bulanan ',
            'databulanan' => $this->ModelLaporan->DataBulanan($bulan, $tahun),
            'web' => $this->ModelAdmin->DetailData(),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/v_tabel_laporan_bulanan', $data)
        ];

        echo json_encode($response);
        //echo dd($this->ModelLaporan->DataBulanan($bulan, $tahun));
    }

    public function PrintLaporanBulanan($bulan, $tahun)
    {
        $data = [
            'judul' => 'Laporan Bulanan Peminjam',
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'laporan/v_print_lap_bulanan',
            'databulanan' => $this->ModelLaporan->DataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_print_laporan', $data);
    }

    public function LaporanTahunan()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Tahunan',
            'menu' => 'laporan',
            'submenu' => 'laporan-tahunan',
            'page' => 'laporan/v_laporan_tahunan',
            'web' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanTahunan()
    {
        $tahun = $this->request->getPost('tahun');
        $data = [
            'judul' => 'Laporan Tahunan Peminjam',
            'datatahunan' => $this->ModelLaporan->DataTahunan($tahun),
            'web' => $this->ModelAdmin->DetailData(),
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/v_tabel_laporan_tahunan', $data)
        ];

        echo json_encode($response);
        //echo dd($this->ModelLaporan->DataTahunan($tahun));
    }

    public function PrintLaporanTahunan($tahun)
    {
        $data = [
            'judul' => 'Laporan Tahunan Peminjam',
            'web' => $this->ModelAdmin->DetailData(),
            'page' => 'laporan/v_print_lap_tahunan',
            'datatahunan' => $this->ModelLaporan->DataTahunan($tahun),
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_print_laporan', $data);
    }

}
