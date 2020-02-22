<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Karyawan;
use App\Role;
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

        // $request->validate([
        //     'id_karyawan' => 'required',
        //     'jam_masuk' => 'required',
        //     'tanggal' => 'required',
        //     'catatan' => 'required'
        // ]);
        
        Absen::create([
            'id_karyawan' => $request->id_karyawan,
            'jam_masuk' => date('h:i:s'),
            'tanggal' => date('Y-m-d'),
            'catatan' => $request->keterangan
        ]);

        return redirect('/absen')->with('status', 'Please Check Your Belongings And Step Carefully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        return $absen;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        //
    }

    /**
     * Izin absen
     */
    public function izinAbsen()
    {
        return view('absen/izinabsen');
    }
}
