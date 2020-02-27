<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projek_Karyawan extends Model
{
    protected $table = 'projek_karyawan';
    protected $fillable = ['id_karyawan', 'id_projek'];

    public function projek() {
        return $this->belongsTo('App\Projek');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
