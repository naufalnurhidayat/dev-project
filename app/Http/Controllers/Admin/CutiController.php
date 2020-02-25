<?php

namespace App\Http\Controllers\Admin;

use App\Cuti;
use App\JenisCuti;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuti = Cuti::where('status', 'Pending')->orderBy('tgl_cuti', 'desc')->get();
        return view('admin/cuti/index', ['cuti' => $cuti]);
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
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */

    public function terima()
    {
        $cuti = Cuti::where('status', 'Terima')->orderBy('tgl_cuti', 'desc')->get();
        return view('admin/cuti/terima', compact('cuti'));
    }

    public function tolak()
    {
        $cuti = Cuti::where('status', 'Tolak')->orderBy('tgl_cuti', 'desc')->get();
        return view('admin/cuti/tolak', compact('cuti'));
    }
    
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuti $cuti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cuti $cuti)
    {
        Cuti::Where('id', $cuti->id)->Update(['status' => $request['status']]);
        return redirect('/admin/cuti')->with('status', 'Status Berhasil Di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuti $cuti)
    {
        //
    }
}
