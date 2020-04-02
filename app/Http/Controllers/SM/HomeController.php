<?php

namespace App\Http\Controllers\SM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Projek;
use App\Projek_Karyawan;
use App\Absen;

class HomeController extends Controller
{
    public function index() 
    {
        $projek = Projek_Karyawan::where('id_karyawan', auth()->user()->id)->get();
        $get_id_project = [];
        foreach ($projek as $value) {
            $get_id_project[] = $value->id_projek;
        }
        $test = Projek_Karyawan::whereIn('id_projek', $get_id_project)->get();
        $get_id_karyawan = [];
        foreach ($test as $value) {
            if (!in_array($value->id_karyawan, $get_id_karyawan)) {
                $get_id_karyawan[] = $value->id_karyawan;
            }
        }
        $karyawan = User::whereIn('id', $get_id_karyawan)->get();
        $data_absen_karyawan = Absen::whereIn('id_karyawan', $get_id_karyawan)->where('tanggal', date('Y-m-d'))->get();
        $data_absen_pending = Absen::whereIn('id_karyawan', $get_id_karyawan)->where('status', 'Pending')->get();
        return view('sm/home/index', compact(['karyawan', 'data_absen_karyawan', 'data_absen_pending']));
    }
}
