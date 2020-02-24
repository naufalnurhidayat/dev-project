<?php

namespace App\Http\Controllers;

use App\Pinjam;
use App\Kategori;
use App\Barang;
use App\User;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

class pinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $pinjam = Pinjam::all();
        return view('admin.Admin_invetaris.index', compact('pinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_barang)
    {
        $barang = Barang::where('id_barang', $id_barang)->first();
        $kategori = Kategori::where('id_kategori', $barang->id_kategori)->first();
        return view('Invetaris.formInvetaris', ['barang' => $barang, 'kategori' => $kategori]);
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

            'nabar' => 'required',
            'kategory' => 'required',
            'type' => 'required',
            'stok' => 'required',
            'jumlah' => 'required',
            'status' => 'pending',
            'keterangan' => 'required'
        ]);

        Pinjam::create([
            'id_barang' => $request->id_barang,
            'id_kategori' => $request->id_kategori,
            'type' => $request->type,
            'stok' => $request->stok,
            'jumlah_pinjam' => $request->jumlah,
            'tgl_pinjam' => date("Y-m-d"),
            'status' => 'Pending',
            'keterangan' => $request->keterangan
        ]);
        return redirect('/invetaris/pengajuan')->with('status', 'Data Berhasil Di Tambah!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function show(pinjam $id)
    {
        $pinjam = Pinjam::where('id', $id->id)->get();
        return view('admin.Admin_invetaris.show', compact('pinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pinjam)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        // echo $request['status'];exit;
        $k = Pinjam::where('id', $pinjam->id)->first();
        Pinjam::where('id_pinjam', $pinjam->id_pinjam)->update(['status' => $request['status']]);
        return redirect('/admin/detail/'.$k->id)->with('status', 'Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pinjam  $pinjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjam $pinjam)
    {
        //
    }
}
