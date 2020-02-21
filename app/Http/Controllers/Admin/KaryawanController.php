<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use App\Pendidikan;
use App\Agama;
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
        $karyawan = Karyawan::all();
        return view('admin/karyawan/index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $pendidikan = Pendidikan::all();
        $agama = Agama::all();
        return view('admin/karyawan/createkaryawan', ['role' => $role, 'pendidikan' => $pendidikan, 'agama' => $agama]);
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
            'nip' => 'required|unique:karyawan|numeric',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|email|unique:karyawan',
            'jenkel' => 'required',
            'id_role' => 'required|numeric',
            'id_pendidikan' => 'required|numeric',
            'thn_join' => 'required|numeric',
            'no_telp' => 'required|numeric|unique:karyawan',
            'id_agama' => 'required|numeric',
            'alamat' => 'required',
            'password' => 'required|min:6|same:password2',
            'password2' => 'required|min:6|same:password'
        ]);

        Karyawan::create([
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
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'foto' => 'default.jpg'
        ]);

        return redirect('/karyawan')->with('status', 'Karyawan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        return view('admin/karyawan/detailkaryawan', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('admin/karyawan/ubahkaryawan', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nip' => 'required|unique:karyawan|numeric',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|email|unique:karyawan',
            'jenkel' => 'required',
            'id_role' => 'required',
            'id_pendidikan' => 'required',
            'thn_join' => 'required',
            'no_telp' => 'required|unique:karyawan|numeric',
            'id_agama' => 'required',
            'alamat' => 'required'
        ]);

        Karyawan::where('id', $karyawan->id)->Update([
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

        return redirect('/karyawan')->with('status', 'Data Karyawan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        Karyawan::destroy($karyawan->id);
        return redirect('/karyawan')->with('status', 'Karyawan berhasil dihapus');
    }
}
