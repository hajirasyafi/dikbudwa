<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Sekolah;
use App\Models\BeritaModel;

class PanelController extends Controller
{
    public function panel()
    {
        return view('panel.base');
    }

    public function daftarberita()
    {
        $countberita = BeritaModel::count();
        return view('panel.daftarberita', ['countberita'=>$countberita]);
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

    public function sp($id)
    {
        $sekolah =  Sekolah::where('npsn', $id)->first();

        if ($sekolah) {
            foreach ( Sekolah::where('npsn', $id)->get() as $key => $value) {}

            $sekolah = Sekolah::with('getDesa')->where('village_id', $value->village_id)
            ->with('getKecamatan')->where('district_id', $value->district_id)
            ->with('getKota')->where('regency_id', $value->regency_id)
            ->with('getProvinsi')->where('province_id', $value->province_id)
            ->where('npsn', $id)
            ->get();

            $spbc = Sekolah::where('npsn', $id)->first();
            $kecamatan = Kecamatan::where('id', $spbc->district_id)->first();
            $kota = Kota::where('id', $kecamatan->regency_id)->first();
            $provinsi = Provinsi::where('id', $kota->province_id)->first();

            return view('panel.sp', ['satuanpendidikan'=>$sekolah])
            ->with(['spbc'=>$spbc])
            ->with(['kecamatan'=>$kecamatan])
            ->with(['kota'=>$kota])
            ->with(['provinsi'=>$provinsi]);
        }else{
            abort(404);
        }
    }

    public function editberita($id)
    {
        $berita = BeritaModel::where('id', $id)->first();
        return view('panel.editberita', ['berita'=>$berita]);
    }
}
