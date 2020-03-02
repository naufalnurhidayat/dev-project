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
        $cuti = Cuti::where('status', 'Diproses')->orderBy('tgl_cuti', 'desc')->get();
        return view('admin/cuti/index', ['cuti' => $cuti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jencut = JenisCuti::all();
        return view('admin/cuti/create', ['jencut' => $jencut]);
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
        if (auth()->user()->jatah_cuti == 0) {
            return redirect('/admin/cuti/show')->with('jatah', 'Jatah Cuti Anda Telah Habis');
        }
        $request->validate([
            'jencut' => 'required|numeric',
            'awal' => 'required',
            'akhir' => 'required',
            'alasan' => 'required'
        ]);
        Cuti::create([
            'id_karyawan' => auth()->user()->id,
            'id_jenis_cuti' => $request->jencut,
            'tgl_cuti' => date("Y-m-d H:i:s"),
            'awal_cuti' => $request->awal,
            'akhir_cuti' => $request->akhir,
            'alasan_cuti' => $request->alasan,
            'status' => 'Diproses'
        ]);
        return redirect('/admin/cuti/show')->with('status', 'Pengajuan Cuti Berhasil Dibuat');
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
        return view('admin/cuti/detailCuti', compact('cuti'));
    }

    public function cutiAdmin()
    {
        $ct = Cuti::where('id_karyawan', auth()->user()->id)->orderBy('tgl_cuti', 'desc')->get();
        return view('admin/cuti/show', ['ct' => $ct]);
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
        if ($request['status'] == "Terima") {
            $karyawan = User::where('id', $cuti->id_karyawan)->first();
            $k = $karyawan->jatah_cuti -1;
            User::Where('id', $cuti->id_karyawan)->update(['jatah_cuti' => $k]);
        }
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
