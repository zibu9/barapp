<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type_id' => 'required|exists:product_types,id',
            'description' => 'required',
            'quantite' => 'required|integer',
            'purchase_price_per_locker' => 'required|numeric',
            'sale_price_per_locker' => 'required|numeric',
            'purchase_price_per_bottle' => 'required|numeric',
            'selling_price_per_bottle' => 'required|numeric',
        ];
    }
}
