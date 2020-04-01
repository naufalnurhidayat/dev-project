<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
        $data_absen_default = DB::table('absensi')
        ->select('tanggal', DB::raw('count(*) as total'))
        ->groupBy('tanggal')
        ->orderByRaw('tanggal ASC')
        ->get()->toArray();
        $values = [];
        $ids = array_column($data_absen_default, 'tanggal');
        foreach ($tanggal as $value) {
            $get_idx = array_search($value, $ids);
            if (!empty($get_idx)) {
                $values[] = $data_absen_default[$get_idx]->total;
            } else {
                $values[] = 0;
            }
        }
        return view('admin/home/index', compact(['values', 'karyawan', 'data_absen', 'tanggal']));
    }
}