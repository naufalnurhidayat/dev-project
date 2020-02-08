<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori_barang';
    public $primaryKey = 'id_kategori';

    public function barang(){
        return $this->hasMany('App\Barang', 'id_kategori');
    }
}
