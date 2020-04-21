<?php

namespace App\Http\Controllers\SM;

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
        $projek = [];
        foreach ($u[0]->projek as $p) {
            $projek[] = $p->id;
        }
        $projek_karyawan = Projek::whereIn('id', $projek)->with('user')->get();
        $data_cuti = [];
        foreach ($projek_karyawan as $pk) {
            foreach ($pk->user as $k) {
                $data_cuti[] = $k->id;
            }
        }
        $cuti = Cuti::whereIn('id_karyawan', $data_cuti)->orderBy('tgl_cuti', 'desc')->get();
        return view('sm/cuti/index', ['cuti' => $cuti]);
    }

    public function cutiSm()
    {
        $cuti = Cuti::where('id_karyawan', auth()->user()->id)->orderBy('tgl_cuti', 'desc')->get();
        return view('sm/cuti/show', ['cuti' => $cuti]);
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
        return view('sm/cuti/create', ['jencut' => $jencut]);
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
            return redirect('/sm/cuti/create')->with('status', 'Sisa Cuti anda tidak cukup');
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
                return redirect('/sm/cuti/create')->with('status', 'Anda sudah mengajukan cuti ditanggal '.$c->awal_cuti.' sampai '.$c->akhir_cuti.' dan statusnya '. $status .', Silahkan pilih tanggal awal cuti atau akhir cuti setelah tanggal itu');
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
        return redirect('/sm/cuti/show')->with('status', 'Pengajuan Cuti Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    
    public function detailCutiSm(Cuti $cuti)
    {
        return view('sm/cuti/detailCutiSm', compact('cuti'));
    }

    public function detailCuti(Cuti $cuti)
    {
        return view('sm/cuti/detailCuti', compact('cuti'));
    }

    public function filterSm(Request $request)
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
        return view('/sm/cuti/filterSm', compact('cuti'));
    }

    public function filterData(Request $request)
    {
        $cuti;
        $u = User::where('id', auth()->user()->id)->with('projek')->get();
        $projek = [];
        foreach ($u[0]->projek as $p) {
            $projek[] = $p->id;
        }
        $projek_karyawan = Projek::whereIn('id', $projek)->with('user')->get();
        $data_cuti = [];
        foreach ($projek_karyawan as $pk) {
            foreach ($pk->user as $k) {
                $data_cuti[] = $k->id;
            }
        }
        if (empty($request->status) && empty($request->awal) && empty($request->akhir)) {
            $cuti = Cuti::whereIn('id_karyawan', $data_cuti)->orderBy('tgl_cuti', 'desc')->get();
        } elseif (empty($request->awal) || empty($request->akhir)) {
            $cuti = Cuti::whereIn('id_karyawan', $data_cuti)->where('status', $request->status)->orderBy('tgl_cuti', 'desc')->get();
        } elseif (empty($request->status)) {
            $cuti = Cuti::whereIn('id_karyawan', $data_cuti)->whereDate('tgl_cuti', '>=', $request->awal)->whereDate('tgl_cuti', '<=', $request->akhir)->orderBy('tgl_cuti', 'desc')->get();
        } else {
            $cuti = Cuti::whereIn('id_karyawan', $data_cuti)
                        ->whereDate('tgl_cuti', '>=', $request->awal)
                        ->whereDate('tgl_cuti', '<=', $request->akhir)
                        ->where('status', $request->status)
                        ->orderBy('tgl_cuti', 'desc')
                        ->get();
        }
        return view('/sm/cuti/filter', compact('cuti'));
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
            return redirect('/sm/cuti')->with('gagal', 'Status Gagal Di Edit');
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
        return redirect('/sm/cuti')->with('status', 'Status Berhasil Di Edit'); 
    }
}
