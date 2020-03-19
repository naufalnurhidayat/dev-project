<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Absen;

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
        $karyawan = count(User::all());
        $data_absen = count(Absen::where('tanggal', date('Y-m-d'))->get());
        $data_absen_default = Absen::whereBetween('tanggal', [$tanggal[0], $tanggal[6]])->get();
        return view('admin/home/index', ['karyawan' => $karyawan, 'data_absen' => $data_absen, 'tanggal' => $tanggal]);
    }
}
