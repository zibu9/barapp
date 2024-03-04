<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type_id',
        'description',
        'quantite',
        'purchase_price_per_locker',
        'sale_price_per_locker',
        'purchase_price_per_bottle',
        'selling_price_per_bottle',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function limitStock()
    {
        return $this->hasOne(LimitStock::class);
    }

}
