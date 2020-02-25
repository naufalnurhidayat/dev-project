<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $table = 'role';
    protected $fillable = ['role'];
    protected $primaryKey = 'id';
    
    public function user() {
        return $this->hasMany('App\User', 'id');
    }
}
