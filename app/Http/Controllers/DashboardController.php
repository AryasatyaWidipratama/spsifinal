<?php

namespace App\Http\Controllers;

use App\Models\JadwalSidang;
use App\Models\Laporan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['jadwalSidangMahasiswa'] = JadwalSidang::where('id_mahasiswa', auth()->id())->first();
        $data['laporanMahasiswa'] = Laporan::where('id_mahasiswa', auth()->id())->first();

        return view('dashboard.index', $data);
    }
}
