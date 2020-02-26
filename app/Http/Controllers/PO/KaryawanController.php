<?php

namespace App\Http\Controllers\PO;

use App\User;
use App\Projek_Karyawan;
use App\Stream;
use App\Role;
use App\Pendidikan;
use App\Projek;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // public function __construct()
    // {
    //     if (auth()->user()->role != "Admin" || "Scra Master" || "Product Owner") {
    //         return redirect('/');
    //     }
    // }
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
