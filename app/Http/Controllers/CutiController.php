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
        date_default_timezone_set("Asia/Jakarta");
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
        if ($request->Awal_Cuti == $request->Akhir_Cuti) {
            $request->validate([
                'Jenis_Cuti' => 'required|numeric',
                'Awal_Cuti' => 'required|date',
                'Akhir_Cuti' => 'required|date',
                'Total_Cuti' => 'required|numeric',
                'Alasan_Cuti' => 'required'
            ]);
        } else {
            $request->validate([
                'Jenis_Cuti' => 'required|numeric',
                'Awal_Cuti' => 'required|date|before:Akhir_Cuti',
                'Akhir_Cuti' => 'required|date|after:Awal_Cuti',
                'Total_Cuti' => 'required|numeric',
                'Alasan_Cuti' => 'required'
            ]);
        }

        if ($request->Jenis_Cuti == 1 && auth()->user()->jatah_cuti < $request->Total_Cuti) {
            return redirect('/cuti/create')->with('status', 'Sisa Cuti anda tidak cukup');
        }

        $cutiTerakhir = Cuti::Where('id_karyawan', auth()->user()->id)->whereIn('status', ['Diterima', 'Diproses'])->get();
        // Awal Cuti
            $explodeAwal = explode('/', $request->Awal_Cuti);
            $newAwal = [$explodeAwal[2], $explodeAwal[0], $explodeAwal[1]];
            $awal = implode('-', $newAwal);
        // Akhir Cuti
            $explodeAkhir = explode('/', $request->Akhir_Cuti);
            $newAkhir = [$explodeAkhir[2], $explodeAkhir[0], $explodeAkhir[1]];
            $akhir = implode('-', $newAkhir);
        // Mengecek tanggal yg diajukan, apakah sudah dicutikan
        foreach ($cutiTerakhir as $c) {
            if (strtotime($awal) >= strtotime($c->awal_cuti) && strtotime($awal) <= strtotime($c->akhir_cuti) || strtotime($akhir) >= strtotime($c->awal_cuti) && strtotime($akhir) <= strtotime($c->akhir_cuti)) {
                $status = ($c->status == 'Diterima') ? 'sudah Diterima' : 'masih Diproses' ;
                return redirect('/cuti/create')->with('status', 'Anda sudah mengajukan cuti ditanggal '.$c->awal_cuti.' sampai '.$c->akhir_cuti.' dan statusnya '. $status .', Silahkan pilih tanggal awal cuti atau akhir cuti setelah tanggal itu');
            }
        }
        // $date_diff = date_diff(date_create($request->awal), date_create($request->akhir))->d;
        // $total = $date_diff;
        Cuti::create([
            'id_karyawan' => auth()->user()->id,
            'id_jenis_cuti' => $request->Jenis_Cuti,
            'tgl_cuti' => date("Y-m-d H:i:s"),
            'awal_cuti' => $awal,
            'akhir_cuti' => $akhir,
            'total_cuti' => $request->Total_Cuti,
            'alasan_cuti' => $request->Alasan_Cuti,
            'status' => 'Diproses'
        ]);
        return redirect('/cuti')->with('status', 'Pengajuan Cuti Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function show(Cuti $cuti)
    {
        return view('cuti/detailCuti', compact('cuti'));
    }

    public function filterData(Request $request)
    {
        $cuti;
        if (empty($request->status) && empty($request->awal) && empty($request->akhir)) {
            $cuti = Cuti::where('id_karyawan', auth()->user()->id)->orderBy('tgl_cuti', 'desc')->get();
        } elseif (empty($request->awal) || empty($request->akhir)) {
            $cuti = Cuti::where('id_karyawan', auth()->user()->id)->where('status', $request->status)->orderBy('tgl_cuti', 'desc')->get();
        } elseif (empty($request->status)) {
            $cuti = Cuti::where('id_karyawan', auth()->user()->id)->whereDate('tgl_cuti', '>=', $request->awal)->whereDate('tgl_cuti', '<=', $request->akhir)->orderBy('tgl_cuti', 'desc')->get();
        } else {
            $cuti = Cuti::where('id_karyawan', auth()->user()->id)
                        ->whereDate('tgl_cuti', '>=', $request->awal)
                        ->whereDate('tgl_cuti', '<=', $request->akhir)
                        ->where('status', $request->status)
                        ->orderBy('tgl_cuti', 'desc')
                        ->get();
        }
        return view('/cuti/filter', compact('cuti'));
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
