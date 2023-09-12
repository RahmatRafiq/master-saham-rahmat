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
        $sortirData = Sortir::orderBy('created_at', 'desc')->paginate(25);
        $hasilSortir = HasilSortir::orderBy('created_at', 'asc')->paginate(25);
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
            $y_open = $stockData['open'];
            $y_high = $stockData['high'];
            $y_low = $stockData['low'];
            $y_close = $stockData['close'];
            $date = $stockData['date'];

            Sortir::create([
                'symbol' => $symbol,
                'y_open' => $y_open,
                'y_high' => $y_high,
                'y_low' => $y_low,
                'y_close' => $y_close,
                'date' => $date,
            ]);

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

        $apiKey = 'eb1843a911mshe0757ccb1c4961ep18d1ccjsn9c6d2b5d4682';

        foreach ($sortirData as $data) {
            $symbol = $data->symbol;
            $y_close = $data->y_close;
            $y_open = $data->y_open;
            $y_high = $data->y_high;
            $y_low = $data->y_low;

            $response = Http::withHeaders([
                'X-RapidAPI-Host' => 'apidojo-yahoo-finance-v1.p.rapidapi.com',
                'X-RapidAPI-Key' => $apiKey,
            ])->get('https://apidojo-yahoo-finance-v1.p.rapidapi.com/stock/v3/get-chart', [
                'interval' => '1d',
                'symbol' => $symbol,
                'range' => '1d',
            ]);

            $rapidApiData = $response->json();
            $close = $rapidApiData['chart']['result'][0]['indicators']['quote'][0]['close'][0];
            $open = $rapidApiData['chart']['result'][0]['indicators']['quote'][0]['open'][0];
            $high = $rapidApiData['chart']['result'][0]['indicators']['quote'][0]['high'][0];
            $low = $rapidApiData['chart']['result'][0]['indicators']['quote'][0]['low'][0];

            if ($y_low > $open) {
                HasilSortir::create([
                    'symbol' => $data->symbol,
                    'close' => $close,
                    'open' => $open,
                    'high' => $high,
                    'low' => $low,
                    'y_close' => $y_close,
                    'y_open' => $y_open,
                    'y_high' => $y_high,
                    'y_low' => $y_low,

                ]);

                Log::info('Harga low di bawah harga close terbaru untuk symbol: ');
            } else {
                Log::info('Harga low di atas atau sama dengan harga close terbaru untuk symbol: ');
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
