<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CariSahamController extends Controller
{
    public function index()
    {
        return view('backend.layouts.cari-saham');
    }

    public function CariSaham(Request $request)
    {
        $symbol = $request->input('symbol');
        $interval = $request->input('interval_option');
        $range = $request->input('range_option');

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
            'X-RapidAPI-Key' => '24958adb69msha8badb55bc81ba7p131a9bjsn58cba7e0cbdc',
        ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-chart', [
            'interval' => $interval,
            'symbol' => $symbol,
            'range' => $range,

        ]);

        $data = $response->json();

        return view('backend.layouts.cari-saham', compact('data'));

    }

}
