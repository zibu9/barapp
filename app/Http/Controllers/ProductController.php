<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
use App\Services\Product\ProductService;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $types = Type::all();
        $product = Product::first();
        $fields = Schema::getColumnListing('products');
        return view('products.create', compact('types', 'fields'));
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->createProduct($request->validated());

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(StoreProductRequest $request, Product $product)
    {
        $this->productService->updateProduct($product, $request->validated());

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $this->productService->deleteProduct($product);

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
