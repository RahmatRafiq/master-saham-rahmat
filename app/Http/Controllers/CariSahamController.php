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

        $rapidApiKey = env('RAPID_API_KEY');

        $start_time = microtime(true);

        $symbol = $request->input('symbol');
        $interval = $request->input('interval_option');
        $range = $request->input('range_option');

        $responseChart = Http::withHeaders([
            'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
            'X-RapidAPI-Key' => $rapidApiKey,
        ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-chart', [
            'interval' => $interval,
            'symbol' => $symbol,
            'range' => $range,
        ]);

        $responseProfil = Http::withHeaders([
            'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
            'X-RapidAPI-Key' => $rapidApiKey,
        ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-profile', [
            'symbol' => $symbol,
        ]);

        $end_time = microtime(true);
        $execution_time = $end_time - $start_time;

        $dataProfil = $responseProfil->json();
        $data = $responseChart->json();

        return view('backend.layouts.cari-saham',
            [
                'execution_time' => $execution_time,
                'data' => $data,
                'dataProfil' => $dataProfil,
            ]
        );

    }

}
