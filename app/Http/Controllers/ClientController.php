<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseStockRequest;
use App\Services\ClientService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    protected ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function purchaseStock(PurchaseStockRequest $request): JsonResponse
    {
        try {
            $dto = $request->getDTO();
            $result = $this->clientService->purchaseStock($dto);
            return response()->json($result);
        } catch (Exception $e) {
            Log::error('Error while purchasing stock: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'An error occurred'], 500);
        }
    }

    public function getClientTransactions($clientId): JsonResponse
    {
        try {
            $transactions = $this->clientService->getClientTransactions($clientId);
            return response()->json($transactions);
        } catch (ModelNotFoundException $e) {
            Log::warning('Client not found: ' . $e->getMessage());
            return response()->json(['message' => 'Client not found'], 404);
        } catch (Exception $e) {
            Log::error('Error while fetching client transactions: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    public function getMostProfitableClients(): JsonResponse
    {
        try {
            $clients = $this->clientService->getMostProfitableClients();
            return response()->json($clients);
        } catch (Exception $e) {
            Log::error('Error while fetching most profitable clients: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }

    public function getUserFinancialInfo($clientId): JsonResponse
    {
        try {
            $financialInfo = $this->clientService->getUserFinancialInfo($clientId);
            return response()->json($financialInfo);
        } catch (ModelNotFoundException $e) {
            Log::warning('Client not found: ' . $e->getMessage());
            return response()->json(['message' => 'Client not found'], 404);
        } catch (Exception $e) {
            Log::error('Error while fetching user financial info: ' . $e->getMessage());
            return response()->json(['message' => 'An error occurred'], 500);
        }
    }
}

