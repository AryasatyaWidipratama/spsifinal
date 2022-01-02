<?php

namespace App\Http\Controllers;

use App\Models\JadwalSidang;
use App\Models\PengajuanHonor;
use Illuminate\Http\Request;

class HonorController extends Controller
{
    public function index()
    {
        $data['pengajuanHonor'] = PengajuanHonor::with(['jadwalSidang.dosen', 'jadwalSidang.mahasiswa'])->get();
        return view('dashboard.paa.honor.index', $data);
    }

    public function honorBelumDiajukan(Request $request)
    {
        $request->validate([
            'tgl_awal' => ['date'],
            'tgl_akhir' => ['date', 'after_or_equal:tgl_awal']
        ]);

        $idSidangSudahHonor = PengajuanHonor::pluck('id_jadwal_sidang');

        $data['sidangBelumHonor'] = JadwalSidang::when($request->tgl_awal, function ($query) use ($request) {
            $query->whereBetween('tgl_sidang', [$request->tgl_awal, $request->tgl_akhir . ' 23:59:59']);
        })->whereNotIn('id', $idSidangSudahHonor)->get();
        $data['tgl_awal'] = $request->tgl_awal;
        $data['tgl_akhir'] = $request->tgl_akhir;
        // dd($data['sidangBelumHonor']->pluck('id'));
        $data['idSidangBelumHonor'] = $data['sidangBelumHonor']->pluck('id');

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
        foreach ($request->id_jadwal_sidang as $idSidang) {
            PengajuanHonor::create([
                'id_paa' => auth()->id(),
                'id_jadwal_sidang' => $idSidang,
                'tgl_pengajuan' => Date('Y-m-d'),
                'status' => 0,
            ]);
        }

        return redirect()->route('honor.belum-diajukan')->with('success', 'Berhasil mengajukan honor');
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

    public function destroy(PengajuanHonor $honor)
    {
        $honor->delete();
        return redirect()->route('honor.index')->with('success', 'Berhasil menghapus data honor');
    }
}
