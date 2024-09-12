<?php

namespace App\Services\Stocks;

use App\Models\Stock;

class StockService
{
    public function getAllStocks()
    {
        return Stock::orderBy('operation_date', 'desc')->get();
    }

    public function getStocksByDate($date)
    {
        return Stock::whereDate('operation_date', $date)->get();
    }

    public function getFilteredStocks(array $filters)
    {
        $query = Stock::query();

        if (isset($filters['date'])) {
            $query->whereDate('operation_date', $filters['date']);
        }

        if (isset($filters['product_id'])) {
            $query->where('product_id', $filters['product_id']);
        }

        return $query->orderBy('operation_date', 'desc')->get();
    }
}
