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
            <div class="panel-heading text-center">Pengajuan Honor</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Dosen</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    @if ($pengajuanHonor->isNotEmpty())
                    @foreach ($pengajuanHonor as $honor)
                    <tr>
                        <td>{{ $honor->id }}</td>
                        <td>{{ $honor->mahasiswa->nama }}</td>
                        <td>{{ $honor->tgl_sidang }}</td>
                        <td>{{ $honor->ruang_sidang }}</td>
                        <td>
                            <ul class="list-inline m-0">
                                <li class="list-inline-item">
                                    <a href="{{ route('honor-sidang.edit', $honor->id) }}"
                                        class="btn btn-xs btn-block btn-info">
                                        Edit
                                    </a>
                                <li class="list-inline-item">
                                    <form action="{{ route('.destroy', $honor->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-block btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this honor?');">
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
                        <td colspan="5">Belum ada data pengajuan honor</td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>
@endsection