<?php

namespace App\Http\Controllers;

use App\Models\PengajuanHonor;
use Illuminate\Http\Request;

class HonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
