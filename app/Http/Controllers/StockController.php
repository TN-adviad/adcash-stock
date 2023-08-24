<?php

namespace App\Http\Controllers;

use App\Services\StockService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class StockController extends Controller
{
    protected StockService $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    /**
     * Get the most recent stocks.
     *
     * @return JsonResponse
     */
    public function getRecentStocks(): JsonResponse
    {
        try {
            $stocks = $this->stockService->getRecentStocks();
            return response()->json($stocks);
        } catch (Exception $e) {
            Log::error('Error while fetching recent stocks: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    /**
     * Get all stocks.
     *
     * @return JsonResponse
     */
    public function getStocks(): JsonResponse
    {
        try {
            $stocks = $this->stockService->getStocks();
            return response()->json($stocks);
        } catch (Exception $e) {
            Log::error('Error while fetching all stocks: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
}
