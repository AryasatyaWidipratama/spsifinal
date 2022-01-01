@extends('templates.master')
@section('title') Laporan Mahasiswa @endsection

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
            <div class="panel-heading text-center">Laporan</div>
            <div class="panel-body">
                @if ($laporanMahasiswa)
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Tanggal Laporan</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                    <tr>
                        <td>{{ $laporanMahasiswa->id }}</td>
                        <td>{{ $laporanMahasiswa->tgl_laporan }}</td>
                        <td>
                            <a href="{{ Storage::url($laporanMahasiswa->file_laporan) }}" target="_blank">File Laporan Mahasiswa</a>
                        </td>
                        <td>
                            <form action="{{ route('laporan.destroy', [$laporanMahasiswa->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-xs btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this laporan?');">
                                    <i class="fa fa-times-circle"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                </table>
                @else

                <h3>Belum ada file laporan, silahkan upload.</h3>

                <form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_mahasiswa" value="{{ auth()->id() }}">

                    <div class="form-group">
                        <label for="tgl_laporan">Tanggal Laporan</label>
                        <input type="date" class="form-control" id="tgl_laporan" name="tgl_laporan" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">File Laporan</label>
                        <input type="file" id="file_laporan" name="file_laporan" required>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection