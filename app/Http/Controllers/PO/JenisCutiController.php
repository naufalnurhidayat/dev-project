<?php

namespace App\Http\Controllers\Admin;

use App\JenisCuti;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jencut = JenisCuti::all();
        return view('/admin/jeniscuti/index', compact('jencut'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/jeniscuti/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 'jenis_cuti' => 'required' ]);
        JenisCuti::create($request->all());
        return redirect('/admin/jeniscuti')->with('status', 'Data berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JenisCuti  $jenisCuti
     * @return \Illuminate\Http\Response
     */
    public function show(JenisCuti $jenisCuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JenisCuti  $jenisCuti
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisCuti $jenisCuti)
    {
        return view('admin/jeniscuti/edit', compact('jenisCuti'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JenisCuti  $jenisCuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisCuti $jenisCuti)
    {
        $request->validate([ 'jenis_cuti' => 'required' ]);
        JenisCuti::where('id', $jenisCuti->id)->update(['jenis_cuti' => $request->jenis_cuti]);
        return redirect('/admin/jeniscuti')->with('status', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JenisCuti  $jenisCuti
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisCuti $jenisCuti)
    {
        JenisCuti::destroy($jenisCuti->id);
        return redirect('/admin/jeniscuti')->with('status', 'Data Berhasil di Hapus');
    }
}
