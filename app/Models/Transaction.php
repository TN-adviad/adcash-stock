<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'stock_id', 'purchase_price', 'purchase_quantity', 'purchase_date'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
