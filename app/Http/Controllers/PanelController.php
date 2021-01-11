<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use App\Models\Provinsi;
use App\Models\Sekolah;
use App\Models\BeritaModel;
use DataTables;

class PanelController extends Controller
{
    public function panel()
    {
        $countall = [
            'countsekolah' => Sekolah::count(),
            'countsma' => Sekolah::where('jenjang', 'SMA')->count(),
            'countsmp' => Sekolah::where('jenjang', 'SMP')->count(),
            'countsd' => Sekolah::where('jenjang', 'SD')->count(),
            'counttk' => Sekolah::where('jenjang', 'TK')->count(),
            'countpaud' => Sekolah::where('jenjang', 'PAUD')->count()
        ];
        $url = [
            'semuasekolah' => route('panel/semuasekolah'),
            'semuasma' => route('panel/semuasma'),
            'semuasmp' => route('panel/semuasmp'),
            'semuasd' => route('panel/semuasd'),
            'semuatk' => route('panel/semuatk'),
            'semuapaud' => route('panel/semuapaud'),
        ];
        return view('panel.panel', ['countall'=>$countall])
        ->with(['url'=>$url]);
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
        $countall = [
            'countsekolah' => Sekolah::count(),
            'countsma' => Sekolah::where('jenjang', 'SMA')->count(),
            'countsmp' => Sekolah::where('jenjang', 'SMP')->count(),
            'countsd' => Sekolah::where('jenjang', 'SD')->count(),
            'counttk' => Sekolah::where('jenjang', 'TK')->count(),
            'countpaud' => Sekolah::where('jenjang', 'PAUD')->count()
        ];
        $url = [
            'semuasekolah' => route('panel/semuasekolah'),
            'semuasma' => route('panel/semuasma'),
            'semuasmp' => route('panel/semuasmp'),
            'semuasd' => route('panel/semuasd'),
            'semuatk' => route('panel/semuatk'),
            'semuapaud' => route('panel/semuapaud'),
        ];
        return view('panel.sekolah', ['countall'=>$countall])
        ->with(['url'=>$url]);
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

    public function semuasekolah()
    {
        return view('panel.semuasekolah');
    }

    public function pgetsemuasekolah()
    {
        $getsekolah = Sekolah::with('getDesa')
                    ->with('getKecamatan')
                    ->with('getKota')
                    ->with('getProvinsi')
                    ->get();
        $getsekolah = $getsekolah->map(function($getsekolah){
                    $getsekolah['provinsi'] = $getsekolah->getProvinsi->name;
                    $getsekolah['kota'] = $getsekolah->getKota->name;
                    $getsekolah['kecamatan'] = $getsekolah->getKecamatan->name;
                    $getsekolah['desa'] = $getsekolah->getDesa->name;
                    $getsekolah['link'] = route('panel/sp', $getsekolah->npsn);
                    return $getsekolah;
        });
        return DataTables::of($getsekolah)
                ->addIndexColumn()
                ->toJson();
    }

    public function semuasma()
    {
        return view('panel.semuasma');
    }

    public function semuasmp()
    {
        return view('panel.semuasmp');
    }

    public function semuasd()
    {
        return view('panel.semuasd');
    }

    public function semuatk()
    {
        return view('panel.semuatk');
    }

    public function semuapaud()
    {
        return view('panel.semuapaud');
    }
}
