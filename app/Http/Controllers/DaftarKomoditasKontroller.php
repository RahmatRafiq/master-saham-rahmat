<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;

class DaftarKomoditasKontroller extends Controller
{
    public function index()
    {
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
                    // Jika ada pencocokan kode ticker, lanjut ke perusahaan berikutnya
                    break;
                }
            }
        }

        return view('backend.layouts.daftar-komoditas')
            ->with('response', $combinedData);
    }
}
