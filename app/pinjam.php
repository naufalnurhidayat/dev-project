<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    protected $table = 'pinjam_barang';
    public $primarykey = 'id_pinjam';
    public $fillable = ['id_barang', 'id_kategori', 'nama_pinjam', 'jumlah_pinjam', 'tgl_pinjam', 'status', 'keterangan'];
    public $timestamps = false;

    public function Barang(){
        return $this->beLongsTo('App\Barang', 'id_barang', 'id_barang');
    }

    public function Kategori(){
        return $this->beLongsTo('App\Kategori', 'id_kategori', 'id_kategori');
    }

    public function karyawan() {
        return $this->beLongsTo('App\Karyawan', 'id', 'id');
    }
}
