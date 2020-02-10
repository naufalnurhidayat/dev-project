<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    public $primaryKey = 'id_barang';
    public $fillable = ['nama_barang', 'stok', 'type', 'kondisi', 'keterangan'];
    public $timestamps = false;

    public function Kategori(){
        return $this->beLongsTo('App\Kategori','id_kategori');
    }

    // public function pinjam(){
    //     return $this->belongsToMany('App\pinjam');
    // }
}

