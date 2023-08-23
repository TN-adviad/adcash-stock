<?php

namespace App\Http\Requests;

use App\DTO\request\StockPurchaseDTO;
use Illuminate\Foundation\Http\FormRequest;

class PurchaseStockRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'stock_id' => 'required|exists:stocks,id',
            'quantity' => 'required|integer|min:1',
        ];
    }

    /**
     * @return StockPurchaseDTO
     */
    public function getDTO(): StockPurchaseDTO
    {
        return new StockPurchaseDTO($this);
    }
}
