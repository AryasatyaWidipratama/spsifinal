<?php

namespace App\Http\Controllers;

use App\Models\JadwalSidang;
use Illuminate\Http\Request;

class JadwalsidangController extends Controller
{
    public function jadwalSidangMahasiswa()
    {
        $data['jadwalSidang'] = JadwalSidang::where('id_mahasiswa', auth()->id())->first();

        return view('dashboard.mahasiswa.jadwal_sidang', $data);
    }

    public function jadwalSidangDosen()
    {
        $data['jadwalSidang'] = JadwalSidang::where('id_dosen', auth()->id())->get();

        return view('dashboard.dosen.jadwal_sidang', $data);
    }
}
