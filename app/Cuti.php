<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $fillable = ['id_karyawan', 'id_jenis_cuti', 'tgl_cuti', 'awal_cuti', 'akhir_cuti', 'total_cuti', 'jatah_cuti_terakhir', 'alasan_cuti', 'status', 'alasan_tolak_terima'];

    public function user() {
        return $this->belongsTo('App\User', 'id_karyawan', 'id');
    }

    public function jenis_cuti() {
        return $this->belongsTo('App\JenisCuti', 'id_jenis_cuti', 'id');
    }
}