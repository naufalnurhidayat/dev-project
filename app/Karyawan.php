<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'users';
    protected $fillable = ['nip', 'foto', 'nama', 'tmp_lahir', 'tgl_lahir', 'email', 'password', 'jenkel', 'id_role', 'is_stream', 'id_pendidikan', 'thn_join', 'no_telp', 'agama', 'alamat'];
    protected $primaryKey = 'id';
    
    public function role() {
        return $this->belongsTo('App\Role', 'id_role', 'id');
    }
    
    public function pendidikan() {
        return $this->belongsTo('App\Pendidikan', 'id_pendidikan', 'id');
    }

    public function absen() {
        return $this->hasMany('App\Absen', 'id_absen');
    }

    public function pinjam() {
        return $this->hasMany('App\Pinjam', 'id_pinjam');
    }

}
