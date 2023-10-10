<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index()
    {
        $client = new Client();
        $start_time = microtime(true);
        $goapiKey = env('GOAPI_API_KEY');

        $trending_response = $client->get('https://api.goapi.id/v1/stock/idx/trending', [
            'headers' => [
                'accept' => 'application/json',
                'X-API-KEY' => $goapiKey,
            ],
        ]);
        $companies_response = $client->get('https://api.goapi.id/v1/stock/idx/companies', [
            'headers' => [
                'accept' => 'application/json',
                'X-API-KEY' => $goapiKey,
            ],
        ]);
        $top_losers_response = $client->get('https://api.goapi.id/v1/stock/idx/top_loser', [
            'headers' => [
                'accept' => 'application/json',
                'X-API-KEY' => $goapiKey,
            ],
        ]);
        $top_gainers_response = $client->get('https://api.goapi.id/v1/stock/idx/top_gainer', [
            'headers' => [
                'accept' => 'application/json',
                'X-API-KEY' => $goapiKey,
            ],
        ]);

        $end_time = microtime(true);
        $execution_time = $end_time - $start_time;

        $trending = json_decode($trending_response->getBody(), true);
        $companies = json_decode($companies_response->getBody(), true);
        $top_losers = json_decode($top_losers_response->getBody(), true);
        $top_gainers = json_decode($top_gainers_response->getBody(), true);

        return [
            'execution_time' => $execution_time,
            'trending' => $trending['data'],
            'companies' => $companies['data'],
            'top_losers' => $top_losers['data'],
            'top_gainers' => $top_gainers['data'],
        ];
    }
}
