<?php

namespace App\Http\Controllers;

use App\Kembali;
use App\Barang;
use App\Pinjam;
use App\Kategori;
use App\User;
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
        $kembali = Kembali::all();
        // $user = User::all();
        // $pinjam = Pinjam::all();
        // $barang = Barang::all();
        return view('admin.Admin_invetaris.pengembalian', compact('kembali'));
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
    public function update(Request $request, Pinjam $pinjam)
    {
        $status = Pinjam::where('id_pinjam', $pinjam)->first()->status_pinjam;

        if($status != 'Belum') {
            return redirect('admin/kembali')->with('danger', 'Data ini telah di prove');
        }else{
            Pinjam::where('id_pinjam', $pinjam)->Update([
                'status_kembali' => $request->status_kembali
            ]);
        }
        return redirect('admin/kembali')->with('status', 'Berhasil di Prove');

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
}
