<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'designation',
        'stock_initial',
        'stock_final',
        'quantity',
        'product_id',
        'purchase_price_per_locker',
        'sale_price_per_locker',
        'purchase_price_per_bottle',
        'selling_price_per_bottle',
        'operation_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
