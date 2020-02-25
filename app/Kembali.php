<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    protected $table = 'kembali_barang';
    public $primarykey = 'id_kembali';
    public $fillable = ['id_kembali', 'id_barang', 'id_pinjam', 'id', 'tgl_kembali'];
    public $timestamps = false;

    public function Barang(){
        return $this->beLongsTo('App\Barang', 'id_barang', 'id_barang');
    }

    public function Kategori(){
        return $this->beLongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }

    public function User(){
        return $this->beLongsTo('App\User', 'id', 'id');
    }

    public function pinjam(){
        return $this->beLongsTo('App\Pinjam', 'id_pinjam', 'id_pinjam');
    }

}