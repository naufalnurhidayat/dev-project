<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    protected $table = 'pinjam_barang';
    public $primarykey = 'id_pinjam';
    public $fillable = ['id_pinjam', 'id_barang', 'id_kategori', 'id_kembali', 'id', 'nama_pinjam', 'jumlah_pinjam', 'tgl_pinjam', 'status', 'keterangan'];
    public $timestamps = false;

    public function Barang(){
        return $this->beLongsTo('App\Barang', 'id_barang', 'id_barang');
    }

    public function Kategori(){
        return $this->beLongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }

    public function User() {
        return $this->beLongsTo('App\User', 'id', 'id');
    }

    public function kembali(){
        return $this->beLongsTo('App\Kembali', 'id_kembali', 'id_kembali');
    }
}
