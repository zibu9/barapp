<?php

namespace App\Services\Transactions;

use App\Models\Transaction;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    /**
     * Créer une nouvelle transaction et mettre à jour le stock
     *
     * @param array $transactionData
     * @return bool
     */
    public function processTransaction(array $transactionData): bool
    {
        return DB::transaction(function () use ($transactionData) {
            $transaction = Transaction::create($transactionData);

            $stock = Stock::firstOrNew([
                'product_id' => $transactionData['product_id'],
                'operation_date' => $transactionData['operation_date']
            ]);

            if ($transactionData['designation'] === 'entrée') {
                $stock->entries += $transactionData['quantity'];
            } elseif ($transactionData['designation'] === 'sortie') {
                $stock->exits += $transactionData['quantity'];
            }

            // Mise à jour du stock initial et final
            $stock->initial_stock = $stock->final_stock ?? 0;
            $stock->final_stock = $stock->initial_stock + ($stock->entries - $stock->exits);
            $stock->save();

            return true;
        });
    }
}
