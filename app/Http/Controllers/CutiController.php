<?php

namespace App\Http\Controllers;

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
        $cuti = Cuti::where('id_karyawan', auth()->user()->id)->orderBy('tgl_cuti', 'desc')->get();
        return view('cuti/index', ['cuti' => $cuti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->jatah_cuti == 0) {
            return redirect('/cuti')->with('jatah', 'Sisa Cuti Anda Tidak Cukup');
        }
        $jencut = JenisCuti::all();
        return view('cuti/create', ['jencut' => $jencut]);
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
        if ($request->awal == $request->akhir) {
            $request->validate([
                'jencut' => 'required|numeric',
                'awal' => 'required|date',
                'akhir' => 'required|date',
                'totalCuti' => 'required|numeric',
                'alasan' => 'required'
            ]);
        } else {
            $request->validate([
                'jencut' => 'required|numeric',
                'awal' => 'required|date|before:akhir',
                'akhir' => 'required|date|after:awal',
                'totalCuti' => 'required|numeric',
                'alasan' => 'required'
            ]);
        }
    // Awal Cuti
        $explodeAwal = explode('/', $request->awal);
        $newAwal = [$explodeAwal[2], $explodeAwal[0], $explodeAwal[1]];
        $awal = implode('-', $newAwal);
    // Akhir Cuti
        $explodeAkhir = explode('/', $request->akhir);
        $newAkhir = [$explodeAkhir[2], $explodeAkhir[0], $explodeAkhir[1]];
        $akhir = implode('-', $newAkhir);
        // $date_diff = date_diff(date_create($request->awal), date_create($request->akhir))->d;
        // $total = $date_diff;
        if ($request->jencut == 1 && auth()->user()->jatah_cuti < $request->totalCuti) {
            return redirect('/cuti/create')->with('status', 'Sisa Cuti anda tidak cukup');
        }
        Cuti::create([
            'id_karyawan' => auth()->user()->id,
            'id_jenis_cuti' => $request->jencut,
            'tgl_cuti' => date("Y-m-d H:i:s"),
            'awal_cuti' => $awal,
            'akhir_cuti' => $akhir,
            'total_cuti' => $request->totalCuti,
            'alasan_cuti' => $request->alasan,
            'status' => 'Diproses'
        ]);
        return redirect('/cuti')->with('status', 'Pengajuan Cuti Berhasil Dibuat');
    }

    public function editCuti(Cuti $cuti)
    {
        return  view('cuti/tambah_cuti', ['cuti' => $cuti]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function show(Cuti $cuti)
    {
        //
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
        //
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
