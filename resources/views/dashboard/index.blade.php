@extends('templates.master')
@section('title') DASHBOARD @endsection

@section('content')

<h2>Selamat Datang, {{ auth()->user()->role->jenis_role }} {{ auth()->user()->nama }}</h2>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">SIDANG</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>Tanggal</th>
                        <th>Jam</th>
                    </tr>
                    <tr>
                        @if ($jadwalSidangMahasiswa)
                        <td>
                            {{ $jadwalSidangMahasiswa->tgl_sidang }}
                        </td>
                        <td>
                            10.00 - 11.00
                        </td>
                        @else
                        <td colspan="2">Belum ada jadwal sidang</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">LAPORAN</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>File</th>
                        <th>Tanggal Upload</th>
                    </tr>
                    <tr>
                        @if ($laporanMahasiswa)
                        <td>
                            {{ $laporanMahasiswa->file_laporan }}
                        </td>
                        <td>
                            {{ $laporanMahasiswa->tgl_laporan }}
                        </td>
                        @else
                        <td colspan="2">Belum ada file laporan</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection