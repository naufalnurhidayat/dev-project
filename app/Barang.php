<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    public $primaryKey = 'id_barang';
    public $fillable = ['nama_barang', 'id_kategori', 'stok', 'type', 'kondisi', 'keterangan'];
    public $timestamps = false;

    public function Kategori(){
        return $this->beLongsTo('App\Kategori','id_kategori');
    }

    public function Pinjam(){
        return $this->hasMany('App\Pinjam', 'id_pinjam');
    }

    public function temporari(){
        return $this->hasMany('App\Temporari', 'id_temp');
    }

    public function kembali(){
        return $this->hasMany('App\Kembali', 'id_kembali');
    }

    public function user(){
        return $this->beLongsTo('App\User', 'id_karyawan', 'id');
    }
}

