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
        if (auth()->user()->jatah_cuti == 0) {
            return redirect('/admin/cuti/show')->with('jatah', 'Sisa Cuti Andan Tidak Cukup');
        }
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
            return redirect('/admin/cuti/create')->with('status', 'Sisa Cuti anda tidak cukup');
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
        return redirect('/admin/cuti/show')->with('status', 'Pengajuan Cuti Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */

    public function filterData(Request $request)
    {
        $cuti;
        if (empty($request->status) && empty($request->awal) && empty($request->akhir)) {
            $cuti = Cuti::orderBy('tgl_cuti', 'desc')->get();
        } elseif (empty($request->awal) || empty($request->akhir)) {
            $cuti = Cuti::where('status', $request->status)->orderBy('tgl_cuti', 'desc')->get();
        } elseif (empty($request->status)) {
            $cuti = Cuti::whereDate('tgl_cuti', '>=', $request->awal)->whereDate('tgl_cuti', '<=', $request->akhir)->orderBy('tgl_cuti', 'desc')->get();
        } else {
            $cuti = Cuti::whereDate('tgl_cuti', '>=', $request->awal)
                        ->whereDate('tgl_cuti', '<=', $request->akhir)
                        ->where('status', $request->status)
                        ->orderBy('tgl_cuti', 'desc')
                        ->get();
        }
        return view('admin/cuti/filter', compact('cuti'));
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
        $cuti = Cuti::where('id_karyawan', auth()->user()->id)->orderBy('tgl_cuti', 'desc')->get();
        return view('admin/cuti/show', ['cuti' => $cuti]);
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
            Cuti::Where('id', $cuti->id)->Update([
                'status' => $request['status'],
                'jatah_cuti_terakhir' => $cuti->user->jatah_cuti,
                'alasan_tolak_terima' => $request['alasan_tolak']
            ]);
            $pesan = 'Penolakan Pengajuan Cuti';
        } elseif ($request['status'] == "Diterima") {
            Cuti::Where('id', $cuti->id)->Update([
                'status' => $request['status'],
                'jatah_cuti_terakhir' => $cuti->user['jatah_cuti'],
                'alasan_tolak_terima' => $request['alasan_terima']
            ]);
            if ($cuti->jenis_cuti->jenis_cuti == 'Cuti Tahunan') {
                $karyawan = User::where('id', $cuti->id_karyawan)->first();
                $newJatahCuti = $karyawan->jatah_cuti - $cuti->total_cuti;
                User::Where('id', $cuti->id_karyawan)->update(['jatah_cuti' => $newJatahCuti]);
            }
            $pesan = 'Penerimaan Pengajuan Cuti';
        } else {
            return redirect('/admin/cuti')->with('gagal', 'Status Gagal Di Edit');
        }
        // $data = [
            //     'id' => $cuti->id,
            //     'nip' => $cuti->user->nip,
            //     'nama' => $cuti->user->nama,
            //     'email' => $cuti->user->email,
            //     'jenkel' => $cuti->user->jenkel,
            //     'stream' => $cuti->user->stream->stream,
            //     'no_telp' => $cuti->user->no_telp
            // ];
            // Mail::send('admin/cuti/email', $data, function ($message) use($admin){
            //     $message->from('naufalnurhidayat510@gmail.com', 'Aplikasi Telkom');
            //     $message->to($admin->email, $admin->nama);
            //     $message->subject($pesan);
            // });
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
