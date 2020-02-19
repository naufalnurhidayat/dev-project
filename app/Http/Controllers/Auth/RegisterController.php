<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Karyawan;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nip' => ['required', 'string', 'max:15'],
            'nama' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:200', 'unique:Karyawan'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tmp_lahir' => ['required', 'string', 'max:30'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Karyawan::create([
            'nip' => $data['nip'],
            'nama' => $data['nama'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tmp_lahir' => $data['tmp_lahir'],
            'tgl_lahir' => $data['tgl_lahir'],
            'jenkel' => $data['jenkel'],
            'id_role' => $data['id_role'],
            'id_pendidikan' => $data['id_pendidikan'],
            'thn_join' => $data['thn_join'],
            'no_telp' => $data['no_telp'],
            'id_agama' => $data['id_agama'],
            'alamat' => $data['alamat'],
            'foto' => $data['foto']
        ]);
    }
}
