<?php

namespace App\Services;

use App\Models\Transaction;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Exception;

class TransactionService
{
    /**
     * Enregistrer une nouvelle transaction et mettre à jour le stock.
     * @param array $data
     * @return bool
     */
    public function handleTransaction(array $data)
    {
        DB::beginTransaction();

        try {
            $transaction = $this->createTransaction($data);

            $this->updateStock($transaction);

            DB::commit();
            return true;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Erreur lors du traitement de la transaction : ' . $e->getMessage());
        }
    }

    /**
     * Crée une transaction.
     * @param array $data
     * @return Transaction
     */
    protected function createTransaction(array $data)
    {
        return Transaction::create([
            'type' => $data['type'],
            'entrees' => $data['entrees'] ?? 0,
            'sorties' => $data['sorties'] ?? 0,
            'stock_initial' => $data['stock_initial'],
            'stock_final' => $data['stock_final'],
            'quantity' => $data['quantity'],
            'purchase_price_per_locker' => $data['purchase_price_per_locker'],
            'sale_price_per_locker' => $data['sale_price_per_locker'],
            'purchase_price_per_bottle' => $data['purchase_price_per_bottle'],
            'selling_price_per_bottle' => $data['selling_price_per_bottle'],
            'date_op' => $data['date_op'],
        ]);
    }

    /**
     * Met à jour ou insère un stock en fonction de l'existence d'une entrée pour ce produit et cette date.
     * @param Transaction $transaction
     */
    protected function updateStock(Transaction $transaction)
    {
        $stock = Stock::where('product_id', $transaction->product_id)
            ->where('operation_date', $transaction->date_op)
            ->first();

        if ($stock) {
            if ($transaction->type === 'entree') {
                $stock->entries += $transaction->quantity;
            } else {
                $stock->exits += $transaction->quantity;
            }

            $stock->final_stock = $stock->initial_stock + $stock->entries - $stock->exits;
            $stock->save();
        } else {
            // Sinon, on crée un nouveau stock
            Stock::create([
                'product_id' => $transaction->product_id,
                'entries' => $transaction->type === 'entree' ? $transaction->quantity : 0,
                'exits' => $transaction->type === 'sortie' ? $transaction->quantity : 0,
                'initial_stock' => $transaction->stock_initial,
                'final_stock' => $transaction->stock_final,
                'operation_date' => $transaction->date_op,
            ]);
        }
    }
}
