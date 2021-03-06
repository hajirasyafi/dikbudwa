<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Sekolah;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Desa;
use DataTables;

class SekolahController extends Controller
{
    public function deletesekolah($id)
    {
        $sekolah = Sekolah::where('npsn', $id)->first();
        $sekolah->delete();
        $redirect = route('panel/sekolah');
        return response()->json(array(
            'success' => true,
            'redirect' => $redirect
        ));
    }

    public function storesekolah(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_sp' => 'required',
            'jenjang' => 'required',
            'province_id' => 'required',
            'regency_id' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }else{
            Sekolah::create($request->all());
            return redirect()->back();
        }
    }

    public function getprovsp ()
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
            $provinsis['link'] = route('panel/spkota', $idprov);
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
    
    public function getkotasp($id)
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
            $kotas['link'] = route('panel/spkec', $idkota);
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

    public function getkecsp($id)
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
            $kecamatans['link'] = route('panel/spall', $idkecamatan);
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

    public function getallsp($id)
    {        
        $sekolah = Sekolah::with('getDesa')->where('district_id', $id)->get();
        $dataMap = [];
        foreach($sekolah as $k => $s){
            $dataMap[$k] = $s;
            $dataMap[$k]->desa = $s->getDesa->name;
            $dataMap[$k]->link = route('panel/sp', $s->npsn);
        }
        return DataTables::of($dataMap)
        ->addIndexColumn()
        ->addColumn('action', function ($sekolah) {
            return '<div class="btn-group" role="group">
                        <a href="'.route('panel/sp', $sekolah->npsn).'" type="button" class="btn btn-sm btn-info"><i class="material-icons align-middle">visibility</i></a>
                        <a href="#" type="button" class="btn btn-sm btn-success"><i class="material-icons align-middle">edit</i></a>
                        <a href="#" type="button" class="btn btn-sm btn-danger" data-id="'.$sekolah->npsn.'" data-toggle="modal" data-target="#deleteModal" id="getDeleteId"><i class="material-icons align-middle">delete</i></a>
                    </div>';
        })
        ->toJson();
    }

}
