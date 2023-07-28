<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index()
    {
        $client = new Client();
        $companies_response = $client->get('https://api.goapi.id/v1/stock/idx/companies', [
            'headers' => [
                'accept' => 'application/json',
                'X-API-KEY' => 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln',

            ],

        ]);
        $top_losers_response = $client->get('https://api.goapi.id/v1/stock/idx/top_loser', [
            'headers' => [
                'accept' => 'application/json',
                'X-API-KEY' => 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln',
            ],
        ]);
        $top_gainers_response = $client->get('https://api.goapi.id/v1/stock/idx/top_gainer', [
            'headers' => [
                'accept' => 'application/json',
                'X-API-KEY' => 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln',
            ],
        ]);
        $trending_response = $client->get('https://api.goapi.id/v1/stock/idx/trending', [
            'headers' => [
                'accept' => 'application/json',
                'X-API-KEY' => 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln',
            ],
        ]);

        $google_finance_one = $client->get('https://serpapi.com/search.json?engine=google_finance&q=GOTO%3AIDX&api_key=09512e977d82645fced8a76ff6d7cb9c21566062e43ba4ca4e219a926b38c097
');

        $trending = json_decode($trending_response->getBody(), true);
        $companies = json_decode($companies_response->getBody(), true);
        $top_losers = json_decode($top_losers_response->getBody(), true);
        $top_gainers = json_decode($top_gainers_response->getBody(), true);
        $go_finance_one = json_decode($google_finance_one->getBody(), true);

        return [
            'trending' => $trending['data'],
            'companies' => $companies['data'],
            'top_losers' => $top_losers['data'],
            'top_gainers' => $top_gainers['data'],
            'go_finance_one' => $go_finance_one['graph'],
        ];

    }

    public function getHistoricalData(Request $request, $symbol)
    {
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date|after_or_equal:from',
        ]);

        $from = $request->input('from');
        $to = $request->input('to');

        $client = new Client();
        $response = $client->get("https://api.goapi.id/v1/stock/idx/{$symbol}/historical?from={$from}&to={$to}&api_key=x9XNlAlZiYCFlPv8T5glLRgvkF71ln");

        $data = json_decode($response->getBody(), true);

        return [
            'status' => 'success',
            'message' => 'Menampilkan data histori',
            'data' => $data['data']['results'],
        ];
    }
}
