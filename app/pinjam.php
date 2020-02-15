<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    protected $table = 'pinjam_barang';
    public $primarykey = 'id_pinjam';
    public $fillable = ['nama_pinjam', 'jumlah_pinjam', 'tgl_pinjam', 'status', 'keterangan'];
    public $timestamps = false;

    public function Barang(){
        return $this->beLongsTo('App\Barang');
    }

    public function Kategori(){
        return $this->beLongsTo('App\Kategori');
    }
}
