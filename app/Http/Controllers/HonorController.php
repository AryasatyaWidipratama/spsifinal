<?php

namespace App\Http\Controllers;

use App\Models\JadwalSidang;
use App\Models\PengajuanHonor;
use Illuminate\Http\Request;

class HonorController extends Controller
{
    public function index()
    {
        $data['pengajuanHonor'] = PengajuanHonor::all();
        return view('dashboard.paa.honor.index', $data);
    }

    public function honorBelumDiajukan()
    {
        $idSidangSudahHonor = PengajuanHonor::pluck('id_jadwal_sidang');
        $data['sidangBelumHonor'] = JadwalSidang::whereNotIn('id', $idSidangSudahHonor)->get();

        return view('dashboard.paa.honor.sidang_belum_honor', $data);
    }

    public function honorDosen(Request $request)
    {
        $request->validate([
            'tgl_awal' => ['date'],
            'tgl_akhir' => ['date', 'after_or_equal:tgl_awal']
        ]);

        $data['honorDosen'] = PengajuanHonor::when($request->tgl_awal, function ($query) use ($request) {
            $query->whereBetween('tgl_pengajuan', [$request->tgl_awal, $request->tgl_akhir]);
        })
            ->whereHas('jadwalSidang', function ($query) {
                $query->where('id_dosen', auth()->id());
            })
            ->get();
        $data['tgl_awal'] = $request->tgl_awal;
        $data['tgl_akhir'] = $request->tgl_akhir;

        return view('dashboard.dosen.pengajuan_honor', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(PengajuanHonor $pengajuanHonor)
    {
        $pengajuanHonor->delete();
        return redirect()->route('honor.index')->with('success', 'Berhasil menghapus data honor');
    }
}
