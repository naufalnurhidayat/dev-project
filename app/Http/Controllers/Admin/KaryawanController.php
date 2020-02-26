<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Projek_Karyawan;
use App\Stream;
use App\Role;
use App\Pendidikan;
use App\Projek;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('admin/karyawan/index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stream = Stream::all();
        $role = Role::all();
        $pendidikan = Pendidikan::all();
        $projek = Projek::all();
        return view('admin/karyawan/createkaryawan', ['role' => $role, 'stream' => $stream, 'pendidikan' => $pendidikan, 'projek' => $projek]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:users|numeric',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|email|unique:users',
            'jenkel' => 'required',
            'id_role' => 'required|numeric',
            'id_stream' => 'required|numeric',
            'id_pendidikan' => 'required|numeric',
            'thn_join' => 'required|numeric',
            'no_telp' => 'required|numeric|unique:users',
            'agama' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:6|same:password2',
            'password2' => 'required|min:6|same:password'
        ]);
        
        User::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'jenkel' => $request->jenkel,
            'id_role' => $request->id_role,
            'id_stream' => $request->id_stream,
            'id_pendidikan' => $request->id_pendidikan,
            'thn_join' => $request->thn_join,
            'no_telp' => $request->no_telp,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'foto' => 'default.jpg'
        ]);

        return redirect('/login')->with('status', 'Karyawan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin/karyawan/detailkaryawan', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin/karyawan/ubahkaryawan', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nip' => 'required|unique:users|numeric',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|email|unique:users',
            'jenkel' => 'required',
            'id_role' => 'required',
            'id_pendidikan' => 'required',
            'thn_join' => 'required',
            'no_telp' => 'required|unique:users|numeric',
            'id_agama' => 'required',
            'alamat' => 'required'
        ]);

        User::where('id', $user->id)->Update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'jenkel' => $request->jenkel,
            'id_role' => $request->id_role,
            'id_pendidikan' => $request->id_pendidikan,
            'thn_join' => $request->thn_join,
            'no_telp' => $request->no_telp,
            'id_agama' => $request->id_agama,
            'alamat' => $request->alamat
        ]);

        return redirect('/admin/karyawan')->with('status', 'Data Karyawan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/admin/karyawan')->with('status', 'Karyawan berhasil dihapus');
    }
}
