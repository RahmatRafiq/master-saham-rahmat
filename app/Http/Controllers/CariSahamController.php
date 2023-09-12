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
            'X-RapidAPI-Key' => 'eb1843a911mshe0757ccb1c4961ep18d1ccjsn9c6d2b5d4682',
        ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-chart', [
            'interval' => $interval,
            'symbol' => $symbol,
            'range' => $range,
        ]);

        $responseProfil = Http::withHeaders([
            'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
            'X-RapidAPI-Key' => 'eb1843a911mshe0757ccb1c4961ep18d1ccjsn9c6d2b5d4682',
        ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-profile', [
            'symbol' => $symbol,
        ]);

        $dataProfil = $responseProfil->json();
        $data = $responseChart->json();

        return view('backend.layouts.cari-saham',
            [
                'data' => $data,
                'dataProfil' => $dataProfil,
            ]
        );
    }

}
