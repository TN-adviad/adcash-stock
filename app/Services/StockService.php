<?php

namespace App\Services;

use App\Models\Stock;

class StockService
{
    /**
     * @return mixed
     */
    public function getRecentStocks()
    {
        //todo move 3 to constants
        return Stock::orderBy('created_at', 'desc')->take(3)->get();
    }

    /**
     * @return mixed
     */
    public function getStocks()
    {
        //todo pagination/limit
        return Stock::get();
    }
}

