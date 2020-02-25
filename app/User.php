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
    protected $fillable = ['nip', 'nama', 'tmp_lahir', 'tgl_lahir', 'email', 'jenkel', 'id_role', 'id_pendidikan', 'thn_join', 'no_telp', 'id_agama', 'alamat', 'password', 'foto'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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

    public function cuti() {
        return $this->hasMany('App\Cuti', 'id');
    }
}
