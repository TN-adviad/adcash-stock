<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = DB::table('clients')->pluck('id');
        $stocks = DB::table('stocks')->pluck('id');
        $now = Carbon::now();

        $transactions = [];
        foreach ($clients as $clientId) {
            foreach ($stocks as $stockId) {
                $quantity = rand(1, 10);
                $purchasePrice = rand(40, 120);
                $transactions[] = [
                    'client_id' => $clientId,
                    'stock_id' => $stockId,
                    'purchase_price' => $purchasePrice,
                    'purchase_quantity' => $quantity,
                    'purchase_date' => $now->subDays(rand(1, 30)),
                ];
            }
        }

        DB::table('transactions')->insert($transactions);
    }
}
