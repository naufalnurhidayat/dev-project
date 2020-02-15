<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';
    protected $fillable = ['id_karyawan', 'id_jenis_cuti', 'awal_cuti', 'akhir_cuti', 'alasan_cuti'];

    public function karyawan() {
        return $this->belongsTo('App/Karyawan');
    }
}