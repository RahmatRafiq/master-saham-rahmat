<?php

namespace App\Http\Controllers;

use App\Models\HasilSortir;
use App\Models\Sortir;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SortirController extends Controller
{

    public function index()
    {
        $sortirData = Sortir::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.layouts.sortir-saham ',
            ['sortirData' => $sortirData]
        );

    }

    public function sortirSaham($ticker)
    {
        $apiKey = 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln';
        $response = Http::get("https://api.goapi.id/v1/stock/idx/prices?symbols=$ticker&api_key=$apiKey");
        $data = $response->json();

        if (isset($data['data']['results'][0])) {
            $stockData = $data['data']['results'][0];

            $symbol = $stockData['symbol'] . '.JK';
            $open = $stockData['open'];
            $high = $stockData['high'];
            $low = $stockData['low'];
            $close = $stockData['close'];

            Sortir::create([
                'symbol' => $symbol,
                'open' => $open,
                'high' => $high,
                'low' => $low,
                'close' => $close,
            ]);

            return redirect()->back()->with('success', 'Ticker berhasil ditambahkan ke dalam sortir saham.');
        } else {
            return redirect()->back()->with('error', 'Ticker tidak valid atau tidak dapat ditemukan.');
        }

    }

    public function processAndSortStocksDaily()
    {
        $sortirData = Sortir::orderBy('created_at', 'desc')->first();

        if ($sortirData) {
            $symbol = $sortirData->symbol;

            $yesterdayLow = $sortirData->low;

            $apiKey = ('24958adb69msha8badb55bc81ba7p131a9bjsn58cba7e0cbdc');
            $response = Http::withHeaders([
                'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
                'X-RapidAPI-Key' => $apiKey,
            ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-chart', [
                'interval' => '1d',
                'symbol' => $symbol,
                'range' => '1d',
            ]);

            $rapidApiData = $response->json();
            $todayClose = $rapidApiData['chart']['result'][0]['indicators']['quote'][0]['close'][0];

            if ($yesterdayLow < $todayClose) {
                HasilSortir::create([
                    'symbol' => $sortirData->symbol,
                    'open' => $yesterdayLow,
                    'high' => $todayClose,
                    'low' => $yesterdayLow,
                    'close' => $todayClose,
                ]);

                Log::info('Harga low di bawah harga close terbaru');
            } else {
                Log::info('Harga low di atas atau sama dengan harga close terbaru');
            }

        }

        Log::info('Data saham diproses dan di-sortir pada: ' . Carbon::now());
    }

}
