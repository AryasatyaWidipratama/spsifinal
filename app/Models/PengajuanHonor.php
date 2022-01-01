<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanHonor extends Model
{
    use HasFactory;

    protected $table = 'pengajuan_honor';

    protected $fillable = [
        'id_paa', 'id_jadwal_sidang', 'tgl_pengajuan', 'status',
    ];

    public function jadwalSidang()
    {
        return $this->belongsTo(JadwalSidang::class, 'id_jadwal_sidang', 'id');
    }

    public function paa()
    {
        return $this->belongsTo(User::class, 'id_paa', 'id');
    }
}
