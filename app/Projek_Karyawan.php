<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projek_Karyawan extends Model
{
    protected $table = 'projek_karyawan';
    protected $fillable = ['id_karyawan', 'id_projek'];

    // public function user() {
    //     $this->
    // }
}
