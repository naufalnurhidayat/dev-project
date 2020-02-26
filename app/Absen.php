<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['id_karyawan', 'jam_masuk', 'tanggal', 'catatan', 'status', 'picture'];

    public function user() {
        return $this->belongsTo('App\User', 'id_karyawan', 'id');
    }
}
