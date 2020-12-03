<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Sekolah;

class PanelController extends Controller
{
    public function panel()
    {
        return view('panel.base');
    }

    public function daftarberita()
    {
        return view('panel.daftarberita');
    }

    public function newseditor()
    {
        return view('panel.newseditor');
    }

    public function tambahsekolah()
    {
        return view('panel.tambahsekolah');
    }

    public function sekolah()
    {
        return view('panel.sekolah');
    }

    public function spkota($id)
    {
        $provinsi = Provinsi::where('id', $id)->first();
        return view('panel.spkota')->with('provinsi', $provinsi);
    }

    public function spkec($id)
    {
        $kota = Kota::where('id', $id)->first();
        $provinsi = Provinsi::where('id', $kota->province_id)->first();
        return view('panel.spkec', ['kota'=>$kota])->with(['provinsi'=>$provinsi]);
    }

    public function spall($id)
    {
        $kecamatan = Kecamatan::where('id', $id)->first();
        $kota = Kota::where('id', $kecamatan->regency_id)->first();
        $provinsi = Provinsi::where('id', $kota->province_id)->first();
        return view('panel.spall', ['kecamatan'=>$kecamatan])
        ->with(['kota'=>$kota])
        ->with(['provinsi'=>$provinsi]);
    }
}
