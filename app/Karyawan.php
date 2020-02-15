<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = ['nip', 'nama', 'tmp_lahir', 'tgl_lahir', 'email', 'jenkel', 'thn_join', 'no_telp', 'id_agama', 'alamat'];
    protected $primaryKey = 'id';
    
    public function role() {
        return $this->belongsTo('App\Role', 'id_role', 'id');
    }
    
    public function pendidikan() {
        return $this->belongsTo('App\Pendidikan', 'id_pendidikan', 'id');
    }

    public function agama() {
        return $this->belongsTo('App\Agama', 'id_agama', 'id');
    }

}
