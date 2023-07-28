<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;

class DetailSahamController extends Controller
{
    public function index()
    {
        $apiController = new ApiController();
        $response = $apiController->index();

        return view('backend.layouts.detail-saham')
            ->with('response', $response);

    }

}
