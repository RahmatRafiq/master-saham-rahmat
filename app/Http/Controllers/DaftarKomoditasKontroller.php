<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;

class DaftarKomoditasKontroller extends Controller
{
    public function index()
    {
        $apiController = new ApiController();
        $response = $apiController->index();

        return view('backend.layouts.daftar-komoditas')
            ->with('response', $response);

    }
}
