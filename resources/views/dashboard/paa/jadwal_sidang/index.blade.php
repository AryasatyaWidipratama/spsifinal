@extends('templates.master')
@section('title') Jadwal Sidang @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <a href="{{ route('jadwal-sidang.create') }}" class="btn btn-primary">
            TAMBAH
        </a>
        <br>
        <br>

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
                        <th>Aksi</th>
                    </tr>
                    @if ($jadwalSidang->isNotEmpty())
                    @foreach ($jadwalSidang as $jadwal)
                    <tr>
                        <td>{{ $jadwal->id }}</td>
                        <td>{{ $jadwal->mahasiswa->nama }}</td>
                        <td>{{ $jadwal->tgl_sidang }}</td>
                        <td>{{ $jadwal->ruang_sidang }}</td>
                        <td>
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="{{ route('jadwal-sidang.edit') }}" class="btn btn-xs btn-block btn-info">
                                        Edit
                                    </a>
                                <li class="list-inline-item">
                                    <form action="{{ route('jadwal-sidang.destroy') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-block btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this patient?');">
                                            <i class="fa fa-times-circle"></i> Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>

                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5">Belum ada data jadwal sidang</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection