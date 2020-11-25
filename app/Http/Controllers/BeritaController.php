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
            BeritaModel::create([
                'title_berita' => $request->title_berita,
                'description' => $request->description,
                'publish_status' => $request->publish_status,
                'slug' => Str::slug($request->title_berita)
            ]);
            return redirect('newseditor')->with('success', 'Berhasil dibuat.');
        }
    }

    public function getdaftarberita()
    {
        $getdaftarberita = BeritaModel::select(['id', 'title_berita', 'publish_status']);
        return DataTables::eloquent($getdaftarberita)
        ->addIndexColumn()
        ->addColumn('action', function ($getdaftarberita) {
            return '<div class="btn-group" role="group">
                        <a href="#" type="button" class="btn btn-sm btn-success"><i class="material-icons">edit</i></a>
                        <a href="#" type="button" class="btn btn-sm btn-danger" data-id="'.$getdaftarberita->id.'" data-toggle="modal" data-target="#deleteModal" id="getDeleteId"><i class="material-icons">delete</i></a>
                    </div>';
        })
        ->toJson();
    }

    public function deleteberita($id)
    {
        $beritamodel = BeritaModel::find($id);
        $deleteberita = $beritamodel->delete();
    }

}
