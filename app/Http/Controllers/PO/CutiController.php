<?php

namespace App\Http\Controllers\PO;

use App\Cuti;
use App\JenisCuti;
use App\User;
use App\Projek;
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
        $u = User::where('id', auth()->user()->id)->with('projek')->get();
        $projek;
        foreach ($u[0]->projek as $p) {
            $projek = $p->id;
        }
        $projek_karyawan = Projek::where('id', $projek)->with('user')->get();
        $data_cuti = [];
        foreach ($projek_karyawan[0]->user as $pk) {
            $data_cuti[] = $pk->id;
        }
        $cuti = Cuti::whereIn('id_karyawan', $data_cuti)->orderBy('tgl_cuti', 'desc')->get();
        return view('po/cuti/index', ['cuti' => $cuti]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->jatah_cuti == 0) {
            return redirect('/po/cuti/show')->with('jatah', 'Sisa Cuti Andan Tidak Cukup');
        }
        $jencut = JenisCuti::all();
        return view('po/cuti/create', ['jencut' => $jencut]);
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
            return redirect('/po/cuti/create')->with('status', 'Sisa Cuti anda tidak cukup');
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
        return redirect('/po/cuti/show')->with('status', 'Pengajuan Cuti Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */

    public function detailCuti(Cuti $cuti)
    {
        return view('po/cuti/detailCuti', compact('cuti'));
    }
    
    public function show(Cuti $cuti)
    {
        return view('po/cuti/detailCuti', compact('cuti'));
    }

    public function cutiPo()
    {
        $cuti = Cuti::where('id_karyawan', auth()->user()->id)->orderBy('tgl_cuti', 'desc')->get();
        return view('po/cuti/show', ['cuti' => $cuti]);
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
        return redirect('/po/cuti')->with('status', 'Status Berhasil Di Edit');
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
