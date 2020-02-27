<?php

namespace App\Http\Controllers;

use App\Temporari;
use App\Barang;
use App\Kategori;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class temporariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temp = Temporari::all();
        $barang = Barang::all();
        $kategori = Kategori::all();
        return view('Invetaris.keranjang', (['temp' => $temp, 'barang' => $barang, 'kategori' => $kategori]));
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
        $request->validate([
            'keterangan' => 'required'
        ]);

        Pinjam::create([
            'id_barang' => $request->id_barang,
            'id_kategori' => $request->id_kategori,
            'id' => auth()->user()->id,
            'type' => $request->type,
            'stok' => $request->stok,
            'jumlah_pinjam' => $request->jumlah + 1,
            'tgl_pinjam' => date("Y-m-d"),
            'keterangan' => $request->keterangan
            ]);
        return redirect('/invetaris')->with('status', 'Data Berhasil Di Tambah!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Temporari  $temporari
     * @return \Illuminate\Http\Response
     */
    public function show(Temporari $temporari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Temporari  $temporari
     * @return \Illuminate\Http\Response
     */
    public function edit(Temporari $temporari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Temporari  $temporari
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temporari $temporari)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Temporari  $temporari
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temporari $temporari)
    {
        //
    }
}
