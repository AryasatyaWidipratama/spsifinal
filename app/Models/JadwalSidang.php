<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSidang extends Model
{
    use HasFactory;

    protected $table = 'jadwal_sidang';

    protected $fillable = [
        'id_mahasiswa', 'id_paa', 'id_dosen', 'tgl_sidang', 'ruang_sidang', 'semester'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'id_mahasiswa', 'id');
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'id_dosen', 'id');
    }

    public function paa()
    {
        return $this->belongsTo(User::class, 'id_paa', 'id');
    }
}
