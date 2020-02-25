<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $table = 'stream';
    protected $fillable = ['stream'];

    public function stream()
    {
        return $this->hasMany('App\User');
    }

}
