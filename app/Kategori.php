<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori_barang';
    public $primaryKey = 'id_kategori';

    public function Barang(){
        return $this->belongsToMany('App\Barang');
    }

    public function pinjam(){
        return $this->hasMany('App\Pinjam', 'id_kategori');
    }
}
