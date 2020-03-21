<?php

namespace App\Http\Controllers\PO;

use App\User;
use App\Projek_Karyawan;
use App\Projek;
use App\Absen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $tanggal = [
            date("Y-m-d", time()-60*60*24*6),
            date("Y-m-d", time()-60*60*24*5),
            date("Y-m-d", time()-60*60*24*4),
            date("Y-m-d", time()-60*60*24*3),
            date("Y-m-d", time()-60*60*24*2),
            date("Y-m-d", time()-60*60*24*1),
            date("Y-m-d")
        ];
        $projek = Projek_Karyawan::where('id_karyawan', auth()->user()->id)->first();
        $data_karyawan = count(Projek_Karyawan::where('id_projek', $projek->id_projek)->get());
        $data_absen = count(Absen::where('tanggal', date('Y-m-d'))->get());
        return view('po/home/index', compact(['data_karyawan', 'data_absen', 'tanggal']));
    }
}
