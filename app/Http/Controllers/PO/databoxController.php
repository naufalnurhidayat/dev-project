<?php

namespace App\Http\Controllers\PO;
use App\Barang;
use App\Kategori;
use App\Kembali;
use App\Pinjam;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

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
        return view('po/data_barang/index', ['barang' => $barang, 'kategori' => $kategori]);
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
        return view('po/data_barang/create', ['barang' => $barang, 'kategori' => $kategori]);
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
        $kategori = Kategori::all();
        // $kategori = Kategori::find($barang->id_kategori);
        return view('po/data_barang/edit', ['barang' => $barang, 'kategori' => $kategori]);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'stok' => 'required',
            'type' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'required'
        ]);

        // Barang::where('id_barang', $barang->id_barang)->update([
        //     'nama_barang' => $request->nama_barang,
        //     'id_kategori' => $request->id_kategori,
        //     'stok' => $request->stok,
        //     'type' => $request->type,
        //     'kondisi' => $request->kondisi,
        //     'keterangan' => $request->keterangan
        // ]);

        Barang::where('id_barang', $id)
        ->update([
            'nama_barang' => $request->nama_barang,
            'id_kategori' => $request->id_kategori,
            'stok' => $request->stok,
            'type' => $request->type,
            'kondisi' => $request->kondisi,
            'keterangan' => $request->keterangan
        ]);  
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
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang/index')->with('status', 'Data Berhasil di Hapus!!!!');
    }

    public function exportPdf()
    {
        $pinjam = Pinjam::all();
        $pdf = PDF::loadView('po/Admin_invetaris/Print_Admin', ['pinjam' => $pinjam]);
        return $pdf->stream('Data Absensi');
    }
}



