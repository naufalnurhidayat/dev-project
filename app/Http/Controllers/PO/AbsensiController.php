<?php

namespace App\Http\Controllers\PO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Absen;
use App\User;
use App\Projek;
use App\Projek_Karyawan;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projek = Projek_Karyawan::where('id_karyawan', auth()->user()->id)->first();
        $data_karyawan = Projek_Karyawan::where('id_projek', $projek->id_projek)->get();
        $get_id_by_projek = Projek_Karyawan::where('id_projek', $projek->id_projek)->pluck('id_karyawan')->toArray();
        $data_absen = Absen::whereIn('id_karyawan', $get_id_by_projek)->get();
        return view('po/absen/index', compact(['data_absen', 'data_karyawan', 'projek']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tanggal = date('Y-m-d');
        $absen = Absen::where('tanggal', $tanggal)->get();
        return view('po/absen/absen', compact('absen'));
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

        $buttonIzin = $request->izin;

        $user = Absen::where([
            ['id_karyawan', '=', auth()->user()->id],
            ['tanggal', '=', date('Y-m-d')]
            ])->get();
                
        if(count($user) > 0) {
            return redirect('/po/absen')->with('danger', 'Anda telah absen');
        } else if($buttonIzin) {
            
            $request->validate([
                'catatan' => 'required',
                'picture' => 'required|mimes:jpg,jpeg,png'
            ]);

            if($request->hasFile('picture')){
                $request->file('picture')->move('img/absen', $request->file('picture')->getClientOriginalName());
                Absen::create([
                    'id_karyawan' => auth()->user()->id,
                    'jam_masuk' => date('H:i:s'),
                    'tanggal' => date('Y-m-d'),
                    'catatan' => $request->catatan,
                    'status' => 'Pending',
                    'picture' => $request->file('picture')->getClientOriginalName()
                ]);
             }
        } else {
            Absen::create([
                'id_karyawan' => auth()->user()->id,
                'jam_masuk' => date('H:i:s'),
                'tanggal' => date('Y-m-d'),
                'catatan' => 'Masuk',
                'status' => 'Pending',
                'picture' => null
            ]);
        }

        return redirect('/po/absen')->with('status', 'Terima kasih');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Absen::where('id_absen', $id)->first();
        return view('po/absen/detail-absen', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $status = Absen::where('id_absen', $id)->first()->status;
        
        if($status != 'Pending') {
            return redirect('/po/absen/data-kehadiran')->with('danger', 'Data ini telah di prove');
        } else {
            Absen::where('id_absen', $id)->Update([
                'status' => $request->prove
            ]);
        }

        return redirect('/po/absen/data-kehadiran')->with('status', 'Berhasil di prove');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function filterAbsen(Request $request)
    {
        if (empty($request->nama) && empty($request->tanggal_awal) && empty($request->tanggal_akhir)) {
            $data_absen = Absen::orderBy('tanggal', 'desc')->get();
        } elseif (empty($request->tanggal_awal) || empty($request->tanggal_akhir)) {
            $data_absen = Absen::where('id_karyawan', $request->nama)->orderBy('tanggal', 'desc')->get();
        } elseif (empty($request->nama)) {
            $data_absen = Absen::where('tanggal', '>=', $request->tanggal_awal)->where('tanggal', '<=', $request->tanggal_akhir)->orderBy('tanggal', 'desc')->get();
        } else {
            $data_absen = Absen::whereDate('tanggal', '>=', $request->tanggal_awal)
                        ->whereDate('tanggal', '<=', $request->tanggal_akhir)
                        ->where('id_karyawan', $request->nama)
                        ->orderBy('tanggal', 'desc')
                        ->get();
        }
        return view('admin/absen/filter', compact('data_absen'));
    }
}
