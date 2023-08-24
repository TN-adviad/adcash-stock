<?php

namespace App\Services;

use App\Models\Stock;

class StockService
{
    /**
     * @return mixed
     */
    public function getRecentStocks(): mixed
    {
        //todo move 3 to constants
        return Stock::orderBy('created_at', 'desc')->take(3)->get();
    }

    /**
     * @return mixed
     */
    public function getStocks(): mixed
    {
        //todo pagination/limit
        return Stock::get();
    }
}

