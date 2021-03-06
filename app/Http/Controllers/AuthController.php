<?php

namespace App\Http\Controllers;

use App\User;
use App\Projek_Karyawan;
use App\Stream;
use App\Role;
use App\Pendidikan;
use App\Projek;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            if (auth()->user()->role->role == "Admin") {
                return redirect('/admin');
            } elseif (auth()->user()->role->role == "Scrum Master") {
                return redirect('/sm');
            } elseif (auth()->user()->role->role == "Product Owner") {
                return redirect('/po');
            } elseif (auth()->user()->role->role == "User") {
                return redirect('/');
            }
        } else return view('login/login');
    }

    public function login(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->role->role == "Admin") {
                return redirect('/admin');
            } elseif (auth()->user()->role->role == "Scrum Master") {
                return redirect('/sm');
            } elseif (auth()->user()->role->role == "Product Owner") {
                return redirect('/po');
            } else {
                return redirect('/');
            }
        } else return redirect('/login')->with('danger', 'Email atau Password anda salah');
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
        
        $u = User::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'email' => $request->email,
            'jenkel' => $request->jenkel,
            'jatah_cuti' => 12,
            'id_role' => $request->id_role,
            'id_stream' => $request->id_stream,
            'id_pendidikan' => $request->id_pendidikan,
            'thn_join' => $request->thn_join,
            'no_telp' => $request->no_telp,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'foto' => 'default.jpg',
            'is_active' => 0
        ]);
        
        $dataProjek = [];
        foreach ($request->id_projek as $projek) {
            $dataProjek[] = ['id_karyawan' => $u->id, 'id_projek' => $projek];
        }
        Projek_Karyawan::insert($dataProjek);

        return redirect('/login')->with('status', 'Karyawan berhasil ditambahkan');
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('status', 'Anda berhasil logout');
    }

}
