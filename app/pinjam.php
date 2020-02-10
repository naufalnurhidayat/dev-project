<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pinjam extends Model
{
    protected $table = 'pinjam_barang';
    public $primarykey = 'id_pinjam';
    public $guarded = ['id_pinjam', 'id_barang'];
    public $timestamps = false;

    // public function Barang(){
    //     return $this->beLongsTo('App\Barang','id_barang');
    // }
}
