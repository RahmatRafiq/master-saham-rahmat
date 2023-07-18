<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;

class DashboardController extends Controller
{
    public function index()
    {
        $apiController = new ApiController();
        $response = $apiController->index();
        $content = $response->getContent();
        $stocks = json_decode($content, true);

        $count = $stocks['data']['count'];

        return view('backend.layouts.dashboard', ['stocks' => $stocks, 'count' => $count]);
    }
}
