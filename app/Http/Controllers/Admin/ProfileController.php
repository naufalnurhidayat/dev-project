<?php

namespace App\Http\Controllers\Admin;

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
            return view('error/adminNotFound');
        }

        return view('admin/profile/profile');
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
            return view('error/adminNotFound');
        }

        $role = Role::all();
        $stream = Stream::all();
        $pendidikan = Pendidikan::all();
        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];
        return view('admin/profile/edit', ['role' => $role, 'pendidikan'  => $pendidikan, 'stream' => $stream, 'agama' => $agama]);
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
        $user = User::where('id', $id)->first();

        $request->validate([
            'nip' => 'required|numeric',
            'nama' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'required|email',
            'jenkel' => 'required',
            'id_stream' => 'required',
            'id_pendidikan' => 'required',
            'thn_join' => 'required',
            'no_telp' => 'required|numeric',
            'agama' => 'required',
            'alamat' => 'required'
        ]);

        User::where('id', $id)->Update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'jenkel' => $request->jenkel,
            'id_stream' => $request->id_stream,
            'id_pendidikan' => $request->id_pendidikan,
            'thn_join' => $request->thn_join,
            'no_telp' => $request->no_telp,
            'agama' => $request->agama,
            'alamat' => $request->alamat
        ]);

        if($request->hasFile('picture')){
            $request->file('picture')->move('img/profile', $request->file('picture')->getClientOriginalName());
            $user->foto = $request->file('picture')->getClientOriginalName();
            $user->save();
        }

        return redirect('/admin/profile/' . $request->nama)->with('status', 'Profile berhasil diubah');
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
