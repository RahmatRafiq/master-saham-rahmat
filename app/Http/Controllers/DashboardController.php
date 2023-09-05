<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use App\Models\HasilSortir;
use App\Models\Sortir;

class DashboardController extends Controller
{
    public function index()
    {
        $apiController = new ApiController();
        $response = $apiController->index();
        $sortirData = Sortir::get()->count();
        $hasilSortir = HasilSortir::get()->count();

        return view('backend.layouts.dashboard', [

            'response' => $response,
            'sortirData' => $sortirData,
            'hasilSortir' => $hasilSortir,

        ]);

    }
}
