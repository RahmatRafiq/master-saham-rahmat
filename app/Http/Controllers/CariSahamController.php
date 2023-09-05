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

        $responseChart = Http::withHeaders([
            'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
            'X-RapidAPI-Key' => 'f4cbb08322mshad99381e4685b34p192b75jsn11e0e8f31817',
        ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-chart', [
            'interval' => $interval,
            'symbol' => $symbol,
            'range' => $range,
        ]);

        // $responseProfil = Http::withHeaders([
        //     'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
        //     'X-RapidAPI-Key' => 'f4cbb08322mshad99381e4685b34p192b75jsn11e0e8f31817',
        // ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-profile', [
        //     'symbol' => $symbol,
        // ]);

        // $dataProfil = $responseProfil->json();
        $data = $responseChart->json();

        return view('backend.layouts.cari-saham', compact('data',
            // 'dataProfil'
        ));

    }

}
