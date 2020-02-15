<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $fillable = ['nip', 'nama', 'tmp_lahir', 'tgl_lahir', 'email', 'jenkel', 'id_role', 'id_pendidikan', 'thn_join', 'no_telp', 'id_agama', 'alamat'];
    protected $primaryKey = 'id';
    
    public function role() {
        return $this->belongsTo('App/Role');
    }
    
    public function pendidikan() {
        return $this->belongsTo('App/Pendidikan');
    }

    public function agama() {
        return $this->belongsTo('App/Agama');
    }

}
