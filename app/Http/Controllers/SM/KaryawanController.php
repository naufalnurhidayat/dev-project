<?php

namespace App\Http\Controllers\SM;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projek = Projek_Karyawan::where('id_karyawan', auth()->user()->id)->get();
        $get_id_project = [];
        foreach ($projek as $value) {
            $get_id_project[] = $value->id_projek;
        }
        $test = Projek_Karyawan::whereIn('id_projek', $get_id_project)->get();
        $get_id_karyawan = [];
        foreach ($test as $value) {
            if (!in_array($value->id_karyawan, $get_id_karyawan)) {
                $get_id_karyawan[] = $value->id_karyawan;
            }
        }
        $user = User::whereIn('id', $get_id_karyawan)->get();
        $projek_karyawan = Projek::whereIn('id', $get_id_project)->get();
        return view('sm/karyawan/index', compact(['user', 'projek_karyawan']));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $projek_karyawan = Projek_Karyawan::where('id_karyawan', $user->id)->get();
        return view('sm/karyawan/detailkaryawan', compact(['user', 'projek_karyawan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('sm/karyawan/ubahkaryawan', compact(['user', 'projek_karyawan']));
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
    
            User::where('id', $user->id)->Update([
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
    
            return redirect('/sm/karyawan')->with('status', 'Data Karyawan berhasil diubah');
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
        return redirect('/sm/karyawan')->with('status', 'Karyawan berhasil dihapus');
    }
}
