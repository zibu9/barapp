<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Stocks\StockService;

class StockController extends Controller
{
    protected $stockService;

    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    public function index(Request $request)
    {
        $products = Product::all();
        $stocks = $this->stockService->getFilteredStocks($request->all());
        return view('stocks.index', compact('stocks', 'products'));
    }

    public function filterByDate($date)
    {
        $stocks = $this->stockService->getStocksByDate($date);
        return view('stocks.index', compact('stocks'));
    }
}
