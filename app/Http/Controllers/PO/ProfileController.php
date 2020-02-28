<?php

namespace App\Http\Controllers\PO;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\Pendidikan;
use App\Stream;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nama)
    {
        if ($nama != auth()->user()->nama) {
            return view('error/poNotFound');
        }
        return view('po/profile/profile');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id != auth()->user()->id) {
            return view('error/poNotFound');
        }

        $role = Role::all();
        $stream = Stream::all();
        $pendidikan = Pendidikan::all();
        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        return view('po/profile/edit', ['role' => $role, 'pendidikan'  => $pendidikan, 'stream' => $stream, 'agama' => $agama]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        User::where('id', $id)->Update([
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
            'agama' => $request->agama,
            'alamat' => $request->alamat
        ]);

        return redirect('/po/profile/' . $request->nama)->with('status', 'Profile berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}