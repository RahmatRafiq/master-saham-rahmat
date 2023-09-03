<?php

namespace App\Http\Controllers;

use App\Models\HasilSortir;
use App\Models\Sortir;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SortirController extends Controller
{

    public function index()
    {
        $sortirData = Sortir::orderBy('created_at', 'desc')->paginate(10);
        $hasilSortir = HasilSortir::orderBy('created_at', 'asc')->paginate(10);
        return view('backend.layouts.sortir-saham ',
            [
                'sortirData' => $sortirData,
                'hasilSortir' => $hasilSortir,
            ]
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
            $date = $stockData['date'];

            Sortir::create([
                'symbol' => $symbol,
                'open' => $open,
                'high' => $high,
                'low' => $low,
                'close' => $close,
                'date' => $date,
            ]);

            // dd($data);
            return redirect()->back()->with('success', 'Ticker berhasil ditambahkan ke dalam sortir saham.');
        } else {
            return redirect()->back()->with('error', 'Ticker tidak valid atau tidak dapat ditemukan.');
        }
    }

    public function destroySortirSaham($id)
    {
        $hapusSortirSaham = Sortir::find($id);
        $hapusSortirSaham->delete();
        return redirect()->back()->with('success', 'Data Sortir Saham berhasil dihapus.');
    }

    public function processAndSortStocksDaily()
    {
        $sortirData = Sortir::get();

        $apiKey = '331aea18e2msh7fc6e659aea654bp10147ejsn87ccbc97d54c';

        foreach ($sortirData as $data) {
            $symbol = $data->symbol;
            $yesterdayLow = $data->low;

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

            // $rapidApiData = $response->json();
            // $todayOpen = $rapidApiData['chart']['result'][0]['indicators']['quote'][0]['open'][0];

            if ($yesterdayLow > $todayClose) {
                HasilSortir::create([
                    'symbol' => $data->symbol,
                    'open' => $yesterdayLow,
                    'high' => $todayClose,
                    'low' => $yesterdayLow,
                    'close' => $todayClose,
                ]);
                // if ($yesterdayLow > $todayOpen) {
                //     HasilSortir::create([
                //         'symbol' => $data->symbol,
                //         'open' => $yesterdayLow,
                //         'high' => $todayOpen,
                //         'low' => $yesterdayLow,
                //         'close' => $todayOpen,
                //     ]);
                Log::info('Harga low di bawah harga close terbaru untuk symbol: ' . $data->symbol);
            } else {
                Log::info('Harga low di atas atau sama dengan harga close terbaru untuk symbol: ' . $data->symbol);
            }
        }

        return redirect()->back()->with('success', 'Data Sortir Saham berhasil dihapus.');
    }
    public function destroyHasilSortir($id)
    {
        $hapusHasilSortir = HasilSortir::find($id);
        $hapusHasilSortir->delete();
        return redirect()->back()->with('success', 'Data Sortir Saham berhasil dihapus.');
    }

}
