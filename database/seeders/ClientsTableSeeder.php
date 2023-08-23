<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            ['name' => 'Client A', 'balance' => 1000],
            ['name' => 'Client B', 'balance' => 1500],
            ['name' => 'Client C', 'balance' => 2000],
            ['name' => 'Client D', 'balance' => 2700],
            ['name' => 'Client E', 'balance' => 2500],
        ]);
    }
}
