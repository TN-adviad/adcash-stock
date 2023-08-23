<?php

namespace App\DTO\request;

use App\Http\Requests\PurchaseStockRequest;

class StockPurchaseDTO
{
    private int $client_id;
    private int $stock_id;
    private int $quantity;

    /**
     * @param PurchaseStockRequest $request
     */
    public function __construct(PurchaseStockRequest $request)
    {
        $this->client_id = $request->input('client_id');
        $this->stock_id = $request->input('stock_id');
        $this->quantity = $request->input('quantity');
    }

    /**
     * @return int
     */
    public function getClientId(): int
    {
        return $this->client_id;
    }

    /**
     * @return int
     */
    public function getStockId(): int
    {
        return $this->stock_id;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }
}
