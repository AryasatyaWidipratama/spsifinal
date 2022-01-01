@extends('templates.master')
@section('title') Jadwal Sidang Mahasiswa @endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">Jadwal Sidang</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal Sidang</th>
                        <th>Waktu Sidang</th>
                        <th>Ruang</th>
                    </tr>
                    <tr>
                        @if ($jadwalSidang)
                        <td>{{ $jadwalSidang->id }}</td>
                        <td>{{ $jadwalSidang->mahasiswa->nama }}</td>
                        <td>{{ $jadwalSidang->tgl_sidang }}</td>
                        <td>WAKTU</td>
                        <td>{{ $jadwalSidang->ruang_sidang }}</td>

                        @else
                        <td colspan="5">Belum ada jadwal sidang</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection