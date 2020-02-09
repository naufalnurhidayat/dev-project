<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $table = 'pendidikan';
    public $primarykey = 'id';
    public $guarded = ['id'];
    public $timestamps = false;
}
