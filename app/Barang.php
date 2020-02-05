<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = 'barang';
    public $primaryKey = 'id_barang';
    public $fillable = ['id_barang', 'nama_barang', 'stok', 'type', 'kondisi', 'keterangan'];
    public $timestamps = false;
}