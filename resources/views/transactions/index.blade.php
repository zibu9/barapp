@extends('layouts.app')

@section('title', 'Transactions')

@section('main')
    <div class="container">
        <h1>Transactions</h1>

        <!-- Formulaire de filtrage -->
        <form method="GET" action="{{ route('transactions.index') }}">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="date" class="form-control" placeholder="Sélectionnez une date">
                </div>
                <div class="col-md-4">
                    <select name="product_id" class="form-control select2">
                        <option value="">Tous les produits</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </div>
            </div>
        </form>

        <table id="transactions-table" class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Type</th>
                    <th>Désignation</th>
                    <th>Quantité</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->product->description }}</td>
                        <td>{{ $transaction->type }}</td>
                        <td>{{ $transaction->designation }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->operation_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
