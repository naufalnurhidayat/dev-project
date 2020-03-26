<?php

namespace App\Http\Controllers\PO;

use App\User;
use App\Projek_Karyawan;
use App\Projek;
use App\Absen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Card
        $projek = Projek_Karyawan::where('id_karyawan', auth()->user()->id)->first();
        $data_karyawan = count(Projek_Karyawan::where('id_projek', $projek->id_projek)->get());
        $get_id_by_projek = Projek_Karyawan::where('id_projek', $projek->id_projek)->pluck('id_karyawan')->toArray();
        $data_absen_karyawan = Absen::whereIn('id_karyawan', $get_id_by_projek)->get();

        // Grafik
        $data_absen_default = DB::table('absensi')
        ->select('tanggal', DB::raw('count(' . $data_absen_karyawan . ') as total'))
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
        return $values;
        return view('po/home/index', compact(['data_karyawan', 'data_absen', 'tanggal']));
    }
}
