<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $data['laporanMahasiswa'] = Laporan::where('id_mahasiswa', auth()->id())->first();
        return view('dashboard.mahasiswa.laporan', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_mahasiswa' => ['required'],
            'tgl_laporan' => ['required', 'date'],
            'file_laporan' => ['required']
        ]);

        $validatedData['file_laporan'] = $request->file('file_laporan')->store('public/laporan');
        Laporan::create($validatedData);

        return redirect()->route('laporan.index')->with('success', 'Berhasil upload laporan');
    }

    public function show(Laporan $laporan)
    {
        //
    }

    public function edit(Laporan $laporan)
    {
        //
    }


    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    public function destroy(Laporan $laporan)
    {
        Storage::delete($laporan->file_laporan);
        $laporan->delete();

        return redirect()->route('laporan.index')->with('success', 'Berhasil delete laporan');
    }
}
