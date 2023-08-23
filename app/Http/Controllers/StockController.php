<?php

namespace App\Http\Controllers;

use App\Services\StockService;
use Illuminate\Http\JsonResponse;

class StockController extends Controller
{
    protected StockService $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    /**
     * @return JsonResponse
     */
    public function getRecentStocks(): JsonResponse
    {
        $stocks = $this->stockService->getRecentStocks();
        return response()->json($stocks);
    }

    /**
     * @return JsonResponse
     */
    public function getStocks(): JsonResponse
    {
        $stocks = $this->stockService->getStocks();
        return response()->json($stocks);
    }
}
