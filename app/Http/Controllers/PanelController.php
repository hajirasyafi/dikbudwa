<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
