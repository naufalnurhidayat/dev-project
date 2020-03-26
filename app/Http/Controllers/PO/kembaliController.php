<?php

namespace App\Http\Controllers\PO;

use App\Kembali;
use App\Barang;
use App\Pinjam;
use App\Kategori;
use App\User;
use App\Role;
use App\Projek;
use App\Projek_Karyawan;
use PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class kembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projek = Projek_Karyawan::where('id', auth()->user()->id)->first();
        $data_karyawan = Projek_Karyawan::where('id_projek', $projek->id_projek)->get();
        $get_id_by_projek = Projek_Karyawan::where('id_projek', $projek->id_projek)->pluck('id_karyawan')->toArray();
        $kembali = Kembali::whereIn('id', $get_id_by_projek)->get();
        return view('po/Admin_invetaris/pengembalian', compact('kembali','data_karyawan', 'projek'));
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
        Kembali::create([
            'id_barang' => $request->id_barang,
            'id_kategori' => $request->id_kategori,
            'id_pinjam' => $request->id_pinjam,
            'id' => auth()->user()->id,
            'type' => $request->type,
            'stok' => $request->stok,
            'jumlah_pinjam' => $request->jumlah +1,
            'tgl_kembali' => date("Y-m-d"),
            'status_kembali' => 'Belum',
            'keterangan' => $request->keterangan
        ]);
        return redirect('/invetaris')->with('status', 'Data Berhasil Di Tambah!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function show(Kembali $kembali)
    {
        // $kembali = Kembali::where('id', $kembali->id_pinjam)->get();
        // return view('admin.Admin_invetaris.show_pengembalian', compact('kembali'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function edit(Kembali $kembali)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kembali)
    {
        // return $kembali;
        Kembali::where('id_kembali', $kembali)->Update(['status_kembali' => $request['status_kembali']]);
        if($request['status_kembali'] == "success"){
            $k = Kembali::where('id_kembali', $kembali)->first();
            $barang = Barang::where('id_barang', $k->id_barang)->first();
            // return $barang;
            $i = $barang->stok+1;
            Barang::where('id_barang', $barang->id_barang)->update(['stok' => $i]);
        }
        return redirect('/po/kembali')->with('status', 'Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kembali  $kembali
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kembali $kembali)
    {
        //
    }

    public function periode(Request $request)
    {
        $kembali = Kembali::where('tgl_kembali', '>=', $request->Awal)->where('tgl_kembali', '<=', $request->Akhir)->orderBy('tgl_kembali', 'desc')->get();
        return view('po/Admin_invetaris/filter_kembali', compact('kembali'));
    }

    public function exportPdf()
    {
        $kembali = Kembali::all();
        $pdf = PDF::loadView('po/Admin_invetaris/Print_Kembali', ['kembali' => $kembali]);
        return $pdf->stream('Data Absensi');
    }
}
