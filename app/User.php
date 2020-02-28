<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nip', 'foto', 'nama', 'tmp_lahir', 'tgl_lahir', 'email', 'password', 'jenkel', 'id_role', 'id_stream', 'id_pendidikan', 'thn_join', 'no_telp', 'agama', 'alamat'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function role() {
        return $this->belongsTo('App\Role', 'id_role', 'id');
    }
    
    public function pendidikan() {
        return $this->belongsTo('App\Pendidikan', 'id_pendidikan', 'id');
    }

    public function stream() {
        return $this->belongsTo('App\Stream', 'id_stream', 'id');
    }

    public function absen() {
        return $this->hasMany('App\Absen', 'id_absen');
    }

    public function temporari(){
        return $this->hasMany('App\Temporari', 'id_temp');
    }

    public function Pinjam(){
        return $this->hasMany('App\Pinjam', 'id_pinjam');
    }

    public function kembali(){
        return $this->hasMany('App\Kembali', 'id_kembali');
    }

    public function barang(){
        return $this->hasMany('App\Barang', 'id_barang');
    }

    public function cuti() {
        return $this->hasMany('App\Cuti', 'id');
    }

    public function projek_karyawan() {
        return $this->hasMany('App\Projek_Karyawan', 'id');
    }
}
