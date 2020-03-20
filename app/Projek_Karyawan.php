<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projek_Karyawan extends Model
{
    protected $table = 'projek_karyawan';
    protected $fillable = ['id_karyawan', 'id_projek'];

    public function projek() {
        return $this->belongsToMany('App\Projek', 'id_projek', 'id');
    }

    public function user() {
        return $this->belongsToMany('App\User', 'id_karyawan', 'id');
    }
}
