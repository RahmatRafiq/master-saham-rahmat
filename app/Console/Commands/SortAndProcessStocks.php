<?php

namespace App\Console\Commands;

use App\Http\Controllers\SortirController;
use Illuminate\Console\Command;

class SortAndProcessStocks extends Command
{
    protected $signature = 'app:sort-and-process-stocks';
    protected $description = 'Sort and process stocks';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Buat instance SortirController
        $sortirController = new SortirController();

        // Panggil fungsi processAndSortStocksDaily dari SortirController
        $sortirController->processAndSortStocksDaily();

        $this->info('Sort and process stocks command has been executed.');
    }
}
