<?php

namespace App\Http\Controllers;

class CariSahamController extends Controller
{
    public function index()
    {
        return view('backend.layouts.cari-saham');
    }
}
