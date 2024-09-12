<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\TransactionRequest;
use App\Services\Transactions\TransactionService;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index(Request $request)
    {
        $products = Product::all();
        $transactions = $this->transactionService->getFilteredTransactions($request->all());
        return view('transactions.index', compact('transactions', 'products'));
    }

    public function create()
    {
        $products = Product::all();
        return view('transactions.create', compact('products'));
    }

    public function store(TransactionRequest $request)
    {
        $validatedData = $request->validated();
        $product = Product::findOrFail($validatedData['product_id']);
        // Ajouter les prix actifs du produit dans les données validées
        $validatedData['purchase_price_per_locker'] = $product->purchase_price_per_locker;
        $validatedData['sale_price_per_locker'] = $product->sale_price_per_locker;
        $validatedData['purchase_price_per_bottle'] = $product->purchase_price_per_bottle;
        $validatedData['selling_price_per_bottle'] = $product->selling_price_per_bottle;

        // Appel du service pour traiter la transaction
        $result = $this->transactionService->processTransaction($validatedData);

        // Retour du résultat
        if ($result) {
            return redirect()->back()->with('success', 'Transaction effectuée avec succès.');
        }

        return redirect()->back()->withErrors(['message' => 'Échec de la transaction.']);
    }


}
