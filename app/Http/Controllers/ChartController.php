<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Sekolah;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function chartsekolah()
    {
    	$sekolah = Sekolah::all();
    	$collection = [];
    	$collection['SMA'] = $sekolah->where('jenjang', 'SMA')->count();
    	$collection['SMP'] = $sekolah->where('jenjang', 'SMP')->count();
    	$collection['SD'] = $sekolah->where('jenjang', 'SD')->count();
    	$collection['TK'] = $sekolah->where('jenjang', 'TK')->count();
    	$collection['PAUD'] = $sekolah->where('jenjang', 'PAUD')->count();
    	return response()->json($collection);
    }

    public function chartspnasional()
    {
        $sekolah = Sekolah::all();
        $provinsi = Provinsi::all();
        $collection = [];
        foreach ($provinsi as $key => $value) {
            $collection[$value->name] = $sekolah->where('province_id', $value->id)->count();
        }
        $collect = collect($collection);
        $sorted = $collect->sortDesc();
        $sorted->values()->all();
        return response()->json($sorted);
    }
}
