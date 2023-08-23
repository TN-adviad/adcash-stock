<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Routes for ClientController
Route::post('/clients/purchase', [ClientController::class, 'purchaseStock']);
Route::get('/clients/profitable', [ClientController::class, 'getMostProfitableClients']);
Route::get('/clients/{client}/transactions', [ClientController::class, 'getClientTransactions']);
Route::get('/clients/{client}/financial-info', [ClientController::class, 'getUserFinancialInfo']);


// Routes for StockController
Route::get('/stocks/recent', [StockController::class, 'getRecentStocks']);
Route::get('/stocks', [StockController::class, 'getStocks']);

