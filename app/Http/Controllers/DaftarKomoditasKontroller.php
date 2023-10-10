<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;

class DaftarKomoditasKontroller extends Controller
{
    public function index()
    {
        $start_time = microtime(true);

        $apiController = new ApiController();
        $response = $apiController->index();

        // Menggabungkan data berdasarkan kode ticker
        $combinedData = [];
        foreach ($response['companies']['results'] as $company) {
            foreach ($response['top_gainers']['results'] as $trending) {
                if ($trending['ticker'] === $company['ticker']) {
                    $combinedData[] = [
                        'ticker' => $trending['ticker'],
                        'name' => $company['name'],
                        'logo' => $company['logo'],
                        'percent' => $trending['percent'],
                        'close' => $trending['close'],
                        'change' => $trending['change'],
                    ];
                    break;
                }
            }
        }
        $end_time = microtime(true);
        $execution_time = $end_time - $start_time;
        return view('backend.layouts.daftar-komoditas')
            ->with(
                [
                    'execution_time' => $execution_time,
                    'response' => $combinedData,
                ]
            );
    }

}
