@extends('templates.master')
@section('title') Honor Dosen @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">Informasi Slip Honor</div>
            <div class="panel-body">
                <form method="GET" action="{{ route('honor.dosen') }}" enctype="multipart/form-data">
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
                    <a class="btn btn-info" href="{{ route('honor.dosen') }}">Clear</a>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Data Honor</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>PAA</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @if ($honorDosen->isNotEmpty())
                        @foreach ($honorDosen as $honor)
                        <tr>
                            <td>{{ $honor->paa->nama }}</td>
                            <td>{{ $honor->tgl_pengajuan }}</td>
                            <td>{{ $honor->status }}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="3">Belum ada honor</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection