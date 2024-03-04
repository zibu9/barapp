<?php

namespace App\Services\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function createProductWithLimit(array $productData, array $limitData)
    {
        return DB::transaction(function () use ($productData, $limitData) {
            $product = Product::create($productData);
            $product->limitStock()->create($limitData);
            return $product;
        });
    }

    public function updateProduct(Product $product, array $data)
    {
        $product->update($data);
        return $product;
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
    }
}
