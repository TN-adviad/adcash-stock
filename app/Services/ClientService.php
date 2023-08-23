<?php

namespace App\Services;

use App\DTO\request\StockPurchaseDTO;
use App\DTO\response\FinancialInfoDTO;
use App\Models\Client;
use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class ClientService
{
    public function purchaseStock(StockPurchaseDTO $dto): array
    {
        $result = DB::transaction(function () use ($dto) {
            $client = Client::findOrFail($dto->getClientId());
            $stock = Stock::findOrFail($dto->getStockId());

            $totalCost = $stock->current_price * $dto->getQuantity();

            if ($client->balance < $totalCost) {
                return ['success' => false, 'message' => 'Insufficient balance'];
            }

            // Deduct the purchase amount from the client's balance
            $client->balance -= $totalCost;
            $client->save();

            // Record the transaction
            Transaction::create([
                'client_id' => $client->id,
                'stock_id' => $stock->id,
                'purchase_price' => $stock->current_price,
                'purchase_quantity' => $dto->getQuantity(),
                'purchase_date' => now(),
            ]);

            return ['success' => true, 'message' => 'Stock purchased successfully'];
        });
        return $result;
    }

    public function getClientTransactions($clientId)
    {
        $client = Client::findOrFail($clientId);
        return $client->transactions()
            ->join('stocks', 'transactions.stock_id', '=', 'stocks.id')
            ->select(
                'transactions.*',
                'stocks.name as stock_name',
                'stocks.current_price as stock_current_price'
            )
            ->get();
    }

    public function getMostProfitableClients()
    {
        //todo error handling
        $mostProfitableClients = DB::table('clients')
            ->select('clients.id', 'clients.name', DB::raw('SUM((s.current_price - t.purchase_price) * t.purchase_quantity) AS total_profit'))
            ->leftJoin('transactions AS t', 'clients.id', '=', 't.client_id')
            ->leftJoin('stocks AS s', 't.stock_id', '=', 's.id')
            ->groupBy('clients.id', 'clients.name')
            ->orderBy('total_profit', 'desc')
            ->limit(3)
            ->get();

        return $mostProfitableClients;
    }

    public function getUserFinancialInfo($clientId): FinancialInfoDTO
    {
        $client = Client::findOrFail($clientId);
        $transactions = $client->transactions;
        $currentPortfolioValue = 0;
        $totalProfitLoss = 0;

        foreach ($transactions as $transaction) {
            $stock = Stock::find($transaction->stock_id); //todo query in loop?
            $currentPortfolioValue += $stock->current_price * $transaction->purchase_quantity;
            $totalProfitLoss += ($stock->current_price - $transaction->purchase_price) * $transaction->purchase_quantity;
        }

        return new FinancialInfoDTO($client, $totalProfitLoss, $currentPortfolioValue);
    }
}
