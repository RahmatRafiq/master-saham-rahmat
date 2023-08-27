<?php

namespace App\Http\Controllers;

use App\Models\Sortir;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SortirController extends Controller
{
    public function sortirSaham($ticker)
    {
        // Simpan data harga saham dari goapi pada pukul 18:00 WITA
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
        // Proses data saham pada pukul 09:00 WITA
        // Gunakan RapidAPI untuk memproses dan menyimpan data sortir sesuai kriteria
        // Lakukan perbandingan dan sortir data

        // Contoh kode menggunakan RapidAPI (sesuaikan dengan endpoint yang ada)
        $response = Http::withHeaders([
            'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
            'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
        ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-chart', [
            'interval' => '1d',
            'symbol' => 'BBCA.JK',
            'range' => '1d',
        ]);

        $data = $response->json();
        // Lakukan perbandingan dan sortir data sesuai kriteria
        // ...

        Log::info('Data saham diproses dan di-sortir pada: ' . Carbon::now());
    }
}
