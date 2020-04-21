<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Absen;
use App\User;
use App\Stream;
use App\Exports\AbsenExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_absen = Absen::orderBy('tanggal', 'asc')->get();
        $data_karyawan = User::all();
        return view('admin/absen/index', ['data_absen' => $data_absen, 'data_karyawan' => $data_karyawan]);
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
        return view('admin/absen/absen', compact('absen'));
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
            return redirect('/admin/absen')->with('danger', 'Anda telah absen');
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

        return redirect('/admin/absen')->with('status', 'Terima kasih');
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
        return view('admin/absen/detail-absen', compact('user'));
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
        date_default_timezone_set("Asia/Jakarta");
        $data_absen = Absen::where('id_absen', $id)->first();

        if($data_absen->status != 'Pending') {
            return redirect('/admin/absen/data-kehadiran')->with('danger', 'Data ini telah di prove');
        } else {
            Absen::where('id_absen', $id)->Update([
                'status' => $request->prove
            ]);
        }

        return redirect('/admin/absen/data-kehadiran')->with('status', 'Berhasil di prove');
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

    public function exportExcel() 
    {
        return Excel::download(new AbsenExport, 'Data Absen.xlsx');
    }

    public function exportPdf()
    {
        $absen = Absen::all();
        $pdf = PDF::loadView('admin/absen/export', ['absen' => $absen]);
        return $pdf->download('Data Absensi.pdf');
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

    public function cetak()
    {
        $data_absen = Absen::all();
        return view('admin/absen/cetak', compact('data_absen'));
    }

    public function cetakAll()
    {
        $absen = Absen::all();
        $pdf = PDF::loadView('admin/absen/cetak_data', compact('absen'));
        return $pdf->stream('Data Absensi.pdf');
    }

    public function cetakBulan()
    {
        $tanggal_awal = date('Y-m-d', time()-60*60*24*30);
        $tanggal_akhir = date('Y-m-d');
        $absen = Absen::whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->get();
        $pdf = PDF::loadView('admin/absen/cetak_data', compact('absen'));
        return $pdf->stream('Data Absensi.pdf');
    }
    
    public function cetakNama($id)
    {
        $absen = Absen::where('id_karyawan', $id)->get();
        $pdf = PDF::loadView('admin/absen/cetak_data', compact('absen'));
        return $pdf->stream('Data Absensi.pdf');
    }
    
    public function detailCetak($id)
    {
        $data_absen = Absen::where('id_absen', $id)->first();
        return view('admin/absen/detail_cetak', compact('data_absen'));
    }
}
