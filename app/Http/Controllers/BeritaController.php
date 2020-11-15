<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
            BeritaModel::create($request->all());
            return redirect('newseditor')->with('success', 'Berhasil dibuat.');
        }
    }

    public function getdaftarberita()
    {
        $getdaftarberita = BeritaModel::select(['id', 'title_berita', 'publish_status']);
        return DataTables::eloquent($getdaftarberita)
        ->addIndexColumn()
        ->toJson();
    }

}
