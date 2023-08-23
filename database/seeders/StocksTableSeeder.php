<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stocks')->insert([
            ['name' => 'Stock X', 'currency' => 'EUR', 'current_price' => 50],
            ['name' => 'Stock Y', 'currency' => 'EUR', 'current_price' => 75],
            ['name' => 'Stock Z', 'currency' => 'EUR', 'current_price' => 100],
            ['name' => 'Stock A', 'currency' => 'EUR', 'current_price' => 500],
            ['name' => 'Stock C', 'currency' => 'EUR', 'current_price' => 200],
            ['name' => 'Stock F', 'currency' => 'EUR', 'current_price' => 127],
            // Add more stocks as needed
        ]);
    }
}
