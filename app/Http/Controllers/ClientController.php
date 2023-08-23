<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseStockRequest;
use App\Services\ClientService;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    protected ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function purchaseStock(PurchaseStockRequest $request): JsonResponse
    {
        $dto = $request->getDTO();
        $result = $this->clientService->purchaseStock($dto);
        return response()->json($result);
    }

    public function getClientTransactions($clientId): JsonResponse
    {
        $transactions = $this->clientService->getClientTransactions($clientId);
        return response()->json($transactions);
    }

    public function getMostProfitableClients(): JsonResponse
    {
        $clients = $this->clientService->getMostProfitableClients();
        return response()->json($clients);
    }

    public function getUserFinancialInfo($clientId): JsonResponse
    {
        $financialInfo = $this->clientService->getUserFinancialInfo($clientId);
        return response()->json($financialInfo);
    }


}
