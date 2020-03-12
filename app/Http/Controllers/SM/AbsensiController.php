<?php

namespace App\Http\Controllers\SM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Absen;
use App\Karyawan;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_absen = Absen::all();
        return view('sm/absen/index', compact('data_absen'));
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
        return view('sm/absen/absen', compact('absen'));
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
            return redirect('/sm/absen')->with('danger', 'Anda telah absen');
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

        return redirect('/sm/absen')->with('status', 'Terima kasih');
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
        return view('sm/absen/detail-absen', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data_absen = Absen::where('id_absen', $id)->first();
        
        if($data_absen->status != 'Pending') {
            return redirect('/sm/data-kehadiran')->with('danger', 'Data ini telah di prove');
        } else {
            Absen::where('id_absen', $id)->Update([
                'status' => $request->prove
            ]);
        }

        return redirect('/sm/data-kehadiran')->with('status', 'berhasil di prove');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
