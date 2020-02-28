<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporari extends Model
{
    protected $table = 'temporari';
    public $primarykey = 'id_temp';
    public $fillable = ['id_temp', 'id_barang', 'id_kategori', 'id', 'nama_pinjam', 'jumlah_pinjam', 'tgl_pinjam', 'keterangan'];

    public function barang(){
        return $this->beLongsTo('App\Barang', 'id_barang', 'id_barang');
    }

    public function kategori(){
        return $this->beLongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }

    public function User() {
        return $this->beLongsTo('App\User', 'id', 'id');
    }
}


