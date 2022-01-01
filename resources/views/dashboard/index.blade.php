@extends('templates.master')
@section('title') DASHBOARD @endsection

@section('content')

<h2>Selamat Datang, {{ auth()->user()->role->jenis_role }} {{ auth()->user()->nama }}</h2>

@can('mahasiswa')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">SIDANG</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>Tanggal</th>
                        <th>Ruang</th>
                    </tr>
                    <tr>
                        @if ($jadwalSidangMahasiswa)
                        <td>
                            {{ $jadwalSidangMahasiswa->tgl_sidang }}
                        </td>
                        <td>
                            {{ $jadwalSidangMahasiswa->ruang_sidang }}
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
@endcan

@can('dosen')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">SIDANG</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>Mahasiswa</th>
                        <th>Ruang</th>
                    </tr>
                    @if ($jadwalSidangDosen->isNotEmpty())
                    @foreach ($jadwalSidangDosen as $jadwal)
                    <tr>
                        <td>
                            {{ $jadwal->mahasiswa->nama }}
                        </td>
                        <td>
                            {{ $jadwal->ruang_sidang }}
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="2">Belum ada jadwal sidang</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">JUMLAH HONOR</div>
            <div class="panel-body">
                <h1 class="text-center">{{ $totalHonor }}</h1>
            </div>
        </div>
    </div>
</div>
@endcan

@endsection