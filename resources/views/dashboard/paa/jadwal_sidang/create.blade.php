@extends('templates.master')
@section('title') Create Jadwal Sidang @endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <!-- Default panel contents -->
            <div class="panel-heading text-center">Form Create Jadwal Sidang</div>
            <div class="panel-body">

                <form method="POST" action="{{ route('jadwal-sidang.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_paa" value="{{ auth()->id() }}">

                    <div class="form-group">
                        <label for="id_dosen">Dosen</label>
                        <select class="form-control" id="id_dosen" name="id_dosen" required>
                            <option value="">-- Pilih Dosen --</option>
                            @foreach ($listDosen as $dosen)
                            <option value="{{ $dosen->id }}">{{ $dosen->nama }} - NIP {{ $dosen->nip }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_mahasiswa">Mahasiswa</label>
                        <select class="form-control" id="id_mahasiswa" name="id_mahasiswa" required>
                            <option value="">-- Pilih Mahasiswa --</option>
                            @foreach ($listMahasiswa as $mahasiswa)
                            <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->nama }} - NIM {{ $mahasiswa->nim }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_sidang">Tanggal Sidang</label>
                        <input type="datetime-local" class="form-control" id="tgl_sidang" name="tgl_sidang" required>
                    </div>

                    <div class="form-group">
                        <label for="semester">Semester</label>
                        <input type="text" id="semester" class="form-control" name="semester" required>
                    </div>

                    <div class="form-group">
                        <label for="ruang_sidang">Ruang Sidang</label>
                        <input type="text" id="ruang_sidang" class="form-control" name="ruang_sidang" required>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection