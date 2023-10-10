<?php

namespace Tests\Feature;

use App\Http\Controllers\CariSahamController;
use Tests\TestCase;

// Import controller yang akan diuji

class CariSahamControllerTest extends TestCase
{
    public function testIndex()
    {
        $controller = new CariSahamController(); // Buat instance controller
        $response = $controller->index(); // Panggil method index

        // Memeriksa apakah variabel execution_time ada dalam view
        $response->assertViewHas('execution_time');

        // Memeriksa view yang diharapkan
        $response->assertViewIs('backend.layouts.cari-saham');
    }

    public function testCariSaham()
    {
        $controller = new CariSahamController(); // Buat instance controller

        // Persiapkan data input untuk pengujian
        $requestData = [
            'symbol' => 'AAPL', // Ganti dengan contoh data yang sesuai
            'interval_option' => '1d',
            'range_option' => '1d',
        ];

        // Panggil method CariSaham dengan data input palsu
        $response = $controller->CariSaham(request()->merge($requestData));

        // Memeriksa apakah variabel execution_time ada dalam view
        $response->assertViewHas('execution_time');

        // Memeriksa view yang diharapkan
        $response->assertViewIs('backend.layouts.cari-saham');

        // Anda juga dapat melakukan pengujian lebih lanjut sesuai kebutuhan
    }
}
