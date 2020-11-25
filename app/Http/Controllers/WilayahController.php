<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;

class WilayahController extends Controller
{
    public function getprovinsi ()
    {
        $provinsis = Provinsi::pluck('name', 'id');
        return $provinsis;
    }

    public function getkota ($province_id)
    {
        $kotas = Kota::where('province_id', $province_id)->pluck('name', 'id');
        return $kotas;
    }

    public function getkecamatan ($regency_id)
    {
        $kecamatans = Kecamatan::where('regency_id', $regency_id)->pluck('name', 'id');
        return $kecamatans;
    }

    public function getdesa ($district_id)
    {
        $desas = Desa::where('district_id', $district_id)->pluck('name', 'id');
        return $desas;
    }

}
