<?php

namespace App\Http\Controllers;

use App\Models\JadwalSidang;
use App\Models\Laporan;
use App\Models\PengajuanHonor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $data['jadwalSidangMahasiswa'] = JadwalSidang::where('id_mahasiswa', $userId)->first();
        $data['laporanMahasiswa'] = Laporan::where('id_mahasiswa', $userId)->first();
        $data['jadwalSidangDosen'] =  JadwalSidang::where('id_dosen', $userId)->get();
        $data['totalHonor'] = PengajuanHonor::whereHas('jadwalSidang', function ($query) {
            $query->where('id_dosen', auth()->id());
        })->count();

        return view('dashboard.index', $data);
    }
}
