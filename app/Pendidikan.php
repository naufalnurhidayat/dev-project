<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    protected $primarykey = 'id';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function pendidikan() {
    	return $this->hasMany('App\Pendidikan', 'id');
    }
}
