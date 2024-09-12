<?php

namespace App\Services\Transactions;

use App\Models\Transaction;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class TransactionService
{

    public function processTransaction(array $transactionData): bool
    {
        return DB::transaction(function () use ($transactionData) {
            Transaction::create($transactionData);

            // Chercher ou créer une nouvelle ligne de stock
            $stock = Stock::firstOrNew([
                'product_id' => $transactionData['product_id'],
                'operation_date' => $transactionData['operation_date']
            ]);

            //dd($stock->exists);

            // Si c'est une nouvelle ligne de stock
            if (!$stock->exists) {
                // Chercher le dernier stock pour le produit
                $lastStock = Stock::where('product_id', $transactionData['product_id'])
                    ->orderBy('operation_date', 'desc')
                    ->first();

                // Définir le stock initial du nouveau stock en fonction du dernier stock trouvé
                $stock->initial_stock = $lastStock ? $lastStock->final_stock : 0;
            }

            // Mise à jour des entrées et sorties en fonction de la transaction
            if ($transactionData['designation'] === 'entrée') {
                $stock->entries += $transactionData['quantity'];
            } elseif ($transactionData['designation'] === 'sortie') {
                $stock->exits += $transactionData['quantity'];
            }

            // Mise à jour du stock final
            $stock->final_stock = $stock->initial_stock + ($stock->entries - $stock->exits);

            // Sauvegarde du stock
            $stock->save();

            return true;
        });
    }

    public function getFilteredTransactions(array $filters)
    {
        $query = Transaction::query();

        if (isset($filters['date'])) {
            $query->whereDate('operation_date', $filters['date']);
        }

        if (isset($filters['product_id'])) {
            $query->where('product_id', $filters['product_id']);
        }

        return $query->orderBy('operation_date', 'desc')->get();
    }
}
