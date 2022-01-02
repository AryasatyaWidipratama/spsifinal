@extends('templates.master')
@section('title') Honor @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ session()->get('success') }}
        </div>
        @endif

        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">Honor Belum Diajukan</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Dosen</th>
                        <th>Mahasiswa</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Ruang Sidang</th>
                    </tr>
                    @if ($sidangBelumHonor->isNotEmpty())
                    @foreach ($sidangBelumHonor as $sidang)
                    <tr>
                        <td>{{ $sidang->id }}</td>
                        <td>{{ $sidang->dosen->nama }}</td>
                        <td>{{ $sidang->mahasiswa->nama }}</td>
                        <td>{{ $sidang->tgl_sidang }}</td>
                        <td>{{ $sidang->ruang_sidang }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5">Tidak ada data sidang belum honor</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection