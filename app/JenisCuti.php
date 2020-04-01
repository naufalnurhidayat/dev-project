<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisCuti extends Model
{
    protected $table = 'jenis_cuti';
    protected $fillable = ['jenis_cuti'];

    public function cuti() {
        return $this->hasMany('App\Cuti', 'id');
    }
}
