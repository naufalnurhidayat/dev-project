<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agama';
    protected $fillable = ['agama'];

    public function user() {
        return $this->hasMany('App\User', 'id');
    }
}
