@extends('templates.master')
@section('title') Jadwal Sidang Dosen @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">Jadwal Sidang</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal Sidang</th>
                        <th>Ruang</th>
                    </tr>
                    @if ($jadwalSidang->isNotEmpty())
                    @foreach ($jadwalSidang as $jadwal)
                    <tr>
                        <td>{{ $jadwal->id }}</td>
                        <td>{{ $jadwal->mahasiswa->nama }}</td>
                        <td>{{ $jadwal->tgl_sidang }}</td>
                        <td>{{ $jadwal->ruang_sidang }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4" class="text-center">Belum ada jadwal sidang</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection