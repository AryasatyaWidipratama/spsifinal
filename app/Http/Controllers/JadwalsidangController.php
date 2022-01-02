<?php

namespace App\Http\Controllers;

use App\Models\JadwalSidang;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalsidangController extends Controller
{
    public function index()
    {
        $data['jadwalSidang'] = JadwalSidang::with(['mahasiswa', 'dosen'])->get();
        return view('dashboard.paa.jadwal_sidang.index', $data);
    }

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

    public function create()
    {
        $data['listDosen'] = User::whereHas('role', function ($query) {
            $query->where('jenis_role', 'Dosen');
        })->get();
        $data['listMahasiswa'] = User::whereHas('role', function ($query) {
            $query->where('jenis_role', 'Mahasiswa');
        })->get();

        return view('dashboard.paa.jadwal_sidang.create', $data);
    }

    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'id_paa' => ['required'],
            'id_dosen' => ['required'],
            'id_mahasiswa' => ['required'],
            'tgl_sidang' => ['required'],
            'ruang_sidang' => ['required'],
            'semester' => ['required'],
        ]);

        JadwalSidang::create($validatedRequest);

        return redirect()->route('jadwal-sidang.index')->with('success', 'Berhasil menambah sidang baru');
    }

    public function edit(JadwalSidang $jadwalSidang)
    {
        $data['listDosen'] = User::whereHas('role', function ($query) {
            $query->where('jenis_role', 'Dosen');
        })->get();
        $data['listMahasiswa'] = User::whereHas('role', function ($query) {
            $query->where('jenis_role', 'Mahasiswa');
        })->get();
        $data['jadwalSidang'] = $jadwalSidang;

        return view('dashboard.paa.jadwal_sidang.edit', $data);
    }

    public function update(JadwalSidang $jadwalSidang, Request $request)
    {
        $validatedRequest = $request->validate([
            'id_paa' => ['required'],
            'id_dosen' => ['required'],
            'id_mahasiswa' => ['required'],
            'tgl_sidang' => ['required'],
            'ruang_sidang' => ['required'],
            'semester' => ['required'],
        ]);

        $jadwalSidang->update($validatedRequest);

        return redirect()->route('jadwal-sidang.index')->with('success', 'Berhasil update data sidang');
    }


    public function destroy(JadwalSidang $jadwalSidang)
    {
        $jadwalSidang->delete();
        return redirect()->route('jadwal-sidang.index')->with('success', 'Berhasil menghapus data sidang');
    }
}
