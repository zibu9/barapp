<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_id' => 'required|exists:product_types,id',
            'description' => 'required',
            'quantite' => 'required|integer',
            'purchase_price_per_locker' => 'required|numeric',
            'sale_price_per_locker' => 'required|numeric',
            'purchase_price_per_bottle' => 'required|numeric',
            'selling_price_per_bottle' => 'required|numeric',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'type_id' => 'required|exists:product_types,id',
            'description' => 'required',
            'quantite' => 'required|integer',
            'purchase_price_per_locker' => 'required|numeric',
            'sale_price_per_locker' => 'required|numeric',
            'purchase_price_per_bottle' => 'required|numeric',
            'selling_price_per_bottle' => 'required|numeric',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
