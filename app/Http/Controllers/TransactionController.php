<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\TransactionRequest;
use App\Services\Transactions\TransactionService;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(TransactionRequest $request)
    {
        // Toutes les données sont automatiquement validées grâce à TransactionRequest
        $validatedData = $request->validated();

        // Appel du service pour traiter la transaction
        $result = $this->transactionService->processTransaction($validatedData);

        // Retour du résultat
        if ($result) {
            return redirect()->back()->with('success', 'Transaction effectuée avec succès.');
        }

        return redirect()->back()->withErrors('Échec de la transaction.');
    }
}
