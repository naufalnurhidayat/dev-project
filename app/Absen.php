<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absensi';
    protected $fillable = ['id_karyawan', 'jam_masuk', 'tanggal', 'catatan'];

    public function karyawan() {
        return $this->belongsTo('App\Karyawan', 'id_karyawan', 'id');
    }
}
