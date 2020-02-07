<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang';
    public $primaryKey = 'id_barang';
    public $fillable = ['nama_barang', 'stok', 'type', 'kondisi', 'keterangan'];
    public $timestamps = false;

    public function kategori(){
        return $this->beLongsTo('App\Kategori');
    }
}

