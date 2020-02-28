<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    protected $table = 'projek';
    protected $fillable = ['project'];

    public function projek_karyawan() {
        return $this->hasMany('App\Projek_Karyawan', 'id');
    }
}
