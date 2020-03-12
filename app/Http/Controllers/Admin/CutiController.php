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
        $cuti = Cuti::orderBy('tgl_cuti', 'desc')->get();
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

    public function filterStatus(Request $request)
    {
        if (empty($request->status)) {
            $cuti = Cuti::orderBy('tgl_cuti', 'desc')->get();
        } else {
            $cuti = Cuti::where('status', $request->status)->orderBy('tgl_cuti', 'desc')->get();
        }
        return view('admin/cuti/status', compact('cuti'));
    }
    
    public function detailCuti(Cuti $cuti)
    {
        return view('admin/cuti/detailCuti', compact('cuti'));
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
        if ($request['status'] == "Ditolak") {
            Cuti::Where('id', $cuti->id)->Update(['status' => $request['status']]);
        } elseif ($request['status'] == "Diterima") {
            Cuti::Where('id', $cuti->id)->Update(['status' => $request['status']]);
            $awal = explode('-', $cuti->awal_cuti);
            $akhir = explode('-', $cuti->akhir_cuti);
            $karyawan = User::where('id', $cuti->id_karyawan)->first();
            $total_cuti = $awal[2]-$akhir[2];
            $k = $karyawan->jatah_cuti - $total_cuti;
            User::Where('id', $cuti->id_karyawan)->update(['jatah_cuti' => $k]);
        } else {
            return redirect('/admin/cuti')->with('gagal', 'Status Gagal Di Edit');
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
