<?php

namespace App\Http\Controllers;

use App\Models\JadwalSidang;
use Illuminate\Http\Request;

class JadwalsidangController extends Controller
{
    public function jadwalSidangMahasiswa()
    {
        $data['jadwalSidang'] = JadwalSidang::where('id_mahasiswa', auth()->id())->first();
    }
}
