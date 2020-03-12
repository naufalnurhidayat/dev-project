<?php

namespace App\Http\Controllers;

use App\Absen;
use App\User;
use App\Stream;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tanggal = date('Y-m-d');
        $absen = Absen::where('tanggal', $tanggal)->get();
        return view('absen/index', compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absen/absen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");

        $buttonIzin = $request->izin;

        $user = Absen::where([
            ['id_karyawan', '=', auth()->user()->id],
            ['tanggal', '=', date('Y-m-d')]
            ])->get();
                
        if(count($user) > 0) {
            return redirect('/absen')->with('danger', 'Anda telah absen');
        } else if($buttonIzin) {
            $request->validate([
                'catatan' => 'required',
                'picture' => 'required|mimes:jpg,jpeg,png'
            ]);
            if($request->hasFile('picture')){
                $request->file('picture')->move('img/absen', $request->file('picture')->getClientOriginalName());
                Absen::create([
                    'id_karyawan' => auth()->user()->id,
                    'jam_masuk' => date('H:i:s'),
                    'tanggal' => date('Y-m-d'),
                    'catatan' => $request->catatan,
                    'status' => 'Pending',
                    'picture' => $request->file('picture')->getClientOriginalName()
                ]);
             }
        } else {
            Absen::create([
                'id_karyawan' => auth()->user()->id,
                'jam_masuk' => date('H:i:s'),
                'tanggal' => date('Y-m-d'),
                'catatan' => 'Masuk',
                'status' => 'Pending',
                'picture' => null
            ]);
        }

        return redirect('/absen')->with('status', 'Terima kasih');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        return view('absen/checkabsen', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        
    }

}
