<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\BeritaModel;
use DataTables;

class BeritaController extends Controller
{

    public function storeberita(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['title_berita' => 'required|min:1|max:200',
             'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }else{
            $description = $dom->saveHTML();
            $beritamodel = new BeritaModel;
            $beritamodel->title_berita = $request->title_berita;
            $beritamodel->description = $description;
            $beritamodel->publish_status = $request->publish_status;
            $beritamodel->slug = Str::slug($request->title_berita);
            $beritamodel->save();
            return redirect('panel/daftarberita')->with('success', 'Berhasil dibuat.');
        }
    }

    public function getdaftarberita()
    {
        $getdaftarberita = BeritaModel::select(['id', 'title_berita', 'publish_status']);
        return DataTables::eloquent($getdaftarberita)
        ->addIndexColumn()
        ->addColumn('action', function ($getdaftarberita) {
            return '<div class="btn-group" role="group">
                        <a href="'.route('panel/editberita', $getdaftarberita->id).'" type="button" class="btn btn-sm btn-success"><i class="material-icons align-middle">edit</i></a>
                        <a href="#" type="button" class="btn btn-sm btn-danger" data-id="'.$getdaftarberita->id.'" data-toggle="modal" data-target="#deleteModal" id="getDeleteId">
                            <i class="material-icons align-middle">delete</i>
                        </a>
                    </div>';
        })
        ->addColumn('publish', function ($getdaftarberita){
            if ($getdaftarberita->publish_status == 1) {
                $bootstrap = 'btn-success';
                $text = 'AKTIF';
            }else{
                $bootstrap = 'btn-danger';
                $text = 'TIDAK';
            }
            return '<a href="#" class="btn '.$bootstrap.' text-center" data-id="'.$getdaftarberita->id.'" id="publish" name="'.$getdaftarberita->id.'" status="'.$getdaftarberita->publish_status.'">'.$text.'</a>';
        })
        ->rawColumns(['action', 'publish'])
        ->toJson();
    }

    public function deleteberita($id)
    {
        $beritamodel = BeritaModel::find($id);
        $deleteberita = $beritamodel->delete();
    }

    public function setpub($id, $status)
    {
        $berita = BeritaModel::find($id);
        $berita->publish_status = $status;
        $berita->save();
        return response()->json($berita->save());
    }

    public function getpub($id)
    {
        $berita = BeritaModel::select(['id', 'publish_status'])->where('id', $id)->first();
        return $berita->toJson();
    }

    public function updateberita(Request $request, $id)
    {
        $berita = BeritaModel::find($id);
        $berita->title_berita = $request->title_berita;
        $berita->description = $request->description;
        $berita->save();
        return redirect()->back();
    }
}
