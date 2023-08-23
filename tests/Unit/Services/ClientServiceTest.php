<?php

namespace Services;

use App\Services\ClientService;
use PHPUnit\Framework\TestCase;

namespace Tests\Unit\Services;

use Tests\TestCase;
use App\Services\ClientService;
use App\DTO\request\StockPurchaseDTO;
use App\Models\Client;
use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ClientServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected ClientService $clientService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->clientService = app(ClientService::class);
    }

    public function testGetClientTransactions()
    {
        $client = Client::factory()->create();
        $transaction = Transaction::factory()->create(['client_id' => $client->id]);
        $stock = Stock::find($transaction->stock_id);

        $transactions = $this->clientService->getClientTransactions($client->id);

        $this->assertCount(1, $transactions);
        $this->assertEquals($stock->name, $transactions[0]->stock_name);
        $this->assertEquals($stock->current_price, $transactions[0]->stock_current_price);
    }

}
