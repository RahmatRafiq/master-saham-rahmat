<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function index()
    {
// Membuat Client Guzzle
        $client = new Client();

// Melakukan request
        $response = $client->get('https://api.goapi.id/v1/stock/idx/companies?api_key=x9XNlAlZiYCFlPv8T5glLRgvkF71ln', [
            'headers' => [
                'accept' => 'application/json',
                'X-API-KEY' => 'x9XNlAlZiYCFlPv8T5glLRgvkF71ln',
            ],
        ]);

        // Dapatkan respons dari API
        $stocks = json_decode($response->getBody(), true);

// Kembalikan respons ke klien
        return response()->json($stocks);

    }

}
