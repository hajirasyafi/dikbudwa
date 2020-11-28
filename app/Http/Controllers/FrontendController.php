<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\BeritaModel;
use App\Models\Sekolah;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use DataTables;

class FrontendController extends Controller
{
    public function beranda()
    {
        $berita_models = DB::table('berita_models')->paginate(5);
        strip_tags($berita_models);
        return view('frontend.listberita', ['berita_models'=>$berita_models]);
    }

    public function showberita($slug)
    {
        $berita_models = DB::table('berita_models')->where('slug', $slug)->first();
        return view('frontend.tampilberita', ['berita_models'=>$berita_models]);
    }

    public function sekolah()
    {
        return view('frontend.sekolah');
    }

    public function fgetprovsp ()
    {
        $provinsis = Provinsi::get();
        $sekolah = Sekolah::get();

        $provinsismap = $provinsis->map(function($provinsis) use ($sekolah) {
            $idprov = $provinsis['id'];
            $countsekolah = $sekolah->where('province_id', $idprov)->count();
            $countsma = $sekolah->where('jenjang', 'SMA')->where('province_id', $idprov)->count();
            $countsmp = $sekolah->where('jenjang', 'SMP')->where('province_id', $idprov)->count();
            $countsd = $sekolah->where('jenjang', 'SD')->where('province_id', $idprov)->count();
            $counttk = $sekolah->where('jenjang', 'TK')->where('province_id', $idprov)->count();
            $countpaud = $sekolah->where('jenjang', 'PAUD')->where('province_id', $idprov)->count();
            $provinsis['link'] = route('sekolah/onprovinsi', $idprov);
            $provinsis['sma'] = $countsma;
            $provinsis['smp'] = $countsmp;
            $provinsis['sd'] = $countsd;
            $provinsis['tk'] = $counttk;
            $provinsis['paud'] = $countpaud;
            $provinsis['total'] = $countsekolah;
            return $provinsis;
        });
        return DataTables::of($provinsismap)
        ->addIndexColumn()
        ->toJson();
    }

    public function onprovinsi($id)
    {
        return view('frontend.onprovinsi');
    }

    public function fgetkotasp($id)
    {
        $kotas = Kota::where('province_id', $id)->get();
        $sekolah = Sekolah::get();

        $kotasmap = $kotas->map(function($kotas) use ($sekolah) {
            $idkota = $kotas['id'];
            $countsekolah = $sekolah->where('regency_id', $idkota)->count();
            $countsma = $sekolah->where('jenjang', 'SMA')->where('regency_id', $idkota)->count();
            $countsmp = $sekolah->where('jenjang', 'SMP')->where('regency_id', $idkota)->count();
            $countsd = $sekolah->where('jenjang', 'SD')->where('regency_id', $idkota)->count();
            $counttk = $sekolah->where('jenjang', 'TK')->where('regency_id', $idkota)->count();
            $countpaud = $sekolah->where('jenjang', 'PAUD')->where('regency_id', $idkota)->count();
            $kotas['link'] = route('sekolah/onkota', $idkota);
            $kotas['sma'] = $countsma;
            $kotas['smp'] = $countsmp;
            $kotas['sd'] = $countsd;
            $kotas['tk'] = $counttk;
            $kotas['paud'] = $countpaud;
            $kotas['total'] = $countsekolah;
            return $kotas;
        });
        return DataTables::of($kotasmap)
        ->addIndexColumn()
        ->toJson();
    }

    public function onkota($id)
    {
        return view('frontend.onkota');
    }

    public function fgetkecsp($id)
    {
        $kecamatans = Kecamatan::where('regency_id', $id)->get();
        $sekolah = Sekolah::get();

        $kecamatansmap = $kecamatans->map(function($kecamatans) use ($sekolah) {
            $idkecamatan = $kecamatans['id'];
            $countsekolah = $sekolah->where('district_id', $idkecamatan)->count();
            $countsma = $sekolah->where('jenjang', 'SMA')->where('district_id', $idkecamatan)->count();
            $countsmp = $sekolah->where('jenjang', 'SMP')->where('district_id', $idkecamatan)->count();
            $countsd = $sekolah->where('jenjang', 'SD')->where('district_id', $idkecamatan)->count();
            $counttk = $sekolah->where('jenjang', 'TK')->where('district_id', $idkecamatan)->count();
            $countpaud = $sekolah->where('jenjang', 'PAUD')->where('district_id', $idkecamatan)->count();
            $kecamatans['link'] = route('sekolah/onkecamatan', $idkecamatan);
            $kecamatans['sma'] = $countsma;
            $kecamatans['smp'] = $countsmp;
            $kecamatans['sd'] = $countsd;
            $kecamatans['tk'] = $counttk;
            $kecamatans['paud'] = $countpaud;
            $kecamatans['total'] = $countsekolah;
            return $kecamatans;
        });
        return DataTables::of($kecamatansmap)
        ->addIndexColumn()
        ->toJson();
    }

    public function onkecamatan($id)
    {
        return view('frontend.onkecamatan');
    }

    public function fgetdesasp($id)
    {        
        $sekolah = Sekolah::with('getDesa')->where('district_id', $id)->get();
        $dataMap = [];
        foreach($sekolah as $k => $s){
            $dataMap[$k] = $s;
            $dataMap[$k]->desa = $s->getDesa->name;
            $dataMap[$k]->link = route('satuanpendidikan', $s->npsn);
        }
        return DataTables::of($dataMap)
        ->addIndexColumn()
        ->toJson();
    }

    public function satuanpendidikan($id)
    {
        foreach ( Sekolah::where('npsn', $id)->get() as $key => $value) {
        }
        $sekolah = Sekolah::with('getDesa')->where('village_id', $value->village_id)
        ->with('getKecamatan')->where('district_id', $value->district_id)
        ->with('getKota')->where('regency_id', $value->regency_id)
        ->with('getProvinsi')->where('province_id', $value->province_id)
        ->where('npsn', $id)
        ->get();

        return view('frontend.satuanpendidikan', ['satuanpendidikan'=>$sekolah]);
    }
}
