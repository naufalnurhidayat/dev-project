<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $fillable = ['role'];
    protected $primaryKey = 'id';

    public function role() {
    	return $this->hasMany('App\Karyawan', 'id');
    }
}
