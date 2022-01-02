@extends('templates.master')
@section('title') Honor @endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">Search</div>
            <div class="panel-body">
                <form method="GET" action="{{ route('honor.belum-diajukan') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="tgl_awal">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="{{ $tgl_awal }}"
                            required>
                        @error('tgl_awal')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tgl_akhir">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="{{ $tgl_akhir }}"
                            required>
                        @error('tgl_akhir')
                        <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-default">Search</button>
                    <a class="btn btn-info" href="{{ route('honor.belum-diajukan') }}">Clear</a>
                </form>
            </div>
        </div>
    </div>
</div>

@if($idSidangBelumHonor->isNotEmpty())
<form action="{{ route('honor.store') }}" method="POST">
    @csrf
    @foreach ($idSidangBelumHonor as $idSidang)
    <input type="hidden" name="id_jadwal_sidang[]" value="{{ $idSidang }}">
    @endforeach

    <button type="submit" class="btn btn-primary">Ajukan Honor</button>
</form>
<br><br>
@endif

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
            <div class="panel-heading text-center">Sidang Belum Diajukan Honor</div>
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