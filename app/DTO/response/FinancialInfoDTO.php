<?php

namespace App\DTO\response;

use App\Models\Client;

class FinancialInfoDTO
{
    public string $clientName;
    public float $balance;
    public float $totalProfitLoss;
    public float $currentPortfolioValue;

    public function __construct(Client $client, float $totalProfitLoss, float $currentPortfolioValue)
    {
        $this->balance = $client->balance;
        $this->clientName = $client->name;
        $this->totalProfitLoss = $totalProfitLoss;
        $this->currentPortfolioValue = $currentPortfolioValue;
    }
}
