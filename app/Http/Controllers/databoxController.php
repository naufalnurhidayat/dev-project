<?php

namespace App\Http\Controllers;
use App\Barang;
use App\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class databoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $kategori = Kategori::all();
        return view('admin/data_barang/index', ['barang' => $barang, 'kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = Barang::all();
        $kategori = Kategori::all();
        return view('admin/data_barang/create', ['barang' => $barang, 'kategori' => $kategori]);
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

            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'stok' => 'required',
            'type' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required'
        ]);
        
        Barang::create($request->all());
        return redirect('/barang/index')->with('status', 'Data Berhasil Di Tambah!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_barang)
    {
        $barang = Barang::find($id_barang);
        $kategori = Kategori::find($barang->id_kategori);
        return view('admin/data_barang/edit', ['barang' => $barang, 'kategori' => $kategori]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_barang)
    {
        $request->validate([

            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'stok' => 'required',
            'type' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required'
        ]);

        $barang = Barang::find($id_barang);
        $barang->update($request->all());
        return redirect('/barang/index')->with('status', 'Data Berhasil di Ubah!!!');
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
