<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $table = 'stream';
    protected $fillable = ['stream'];
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasMany('App\User', 'id');
    }

}
