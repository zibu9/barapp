<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LimitStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'minimum_stock',
        'maximum_stock',
    ];
}
