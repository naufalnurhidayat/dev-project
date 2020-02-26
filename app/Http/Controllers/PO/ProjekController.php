<?php

namespace App\Http\Controllers\Admin;

use App\Projek;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projek = Projek::all();
        return view('admin/projek/index', compact('projek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/projek/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 'project' => 'required' ]);
        Projek::create($request->all());
        return redirect('/admin/projek')->with('status', 'Data berhasil di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projek  $projek
     * @return \Illuminate\Http\Response
     */
    public function show(Projek $projek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projek  $projek
     * @return \Illuminate\Http\Response
     */
    public function edit(Projek $projek)
    {
        return view('admin/projek/edit', compact('projek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projek  $projek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projek $projek)
    {
        $request->validate([ 'projek' => 'required' ]);
        Projek::where('id', $projek->id)->update(['project' => $request->projek]);
        return redirect('/admin/projek')->with('status', 'Data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projek  $projek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projek $projek)
    {
        Projek::destroy($projek->id);
        return redirect('/admin/projek')->with('status', 'Data Berhasil di Hapus');
    }
}
