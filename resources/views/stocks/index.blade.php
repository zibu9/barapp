@extends('layouts.app')

@section('title', 'Stocks')

@section('main')
    <div class="container">
        <h1>Stocks</h1>

        <!-- Formulaire de filtrage -->
        <form method="GET" action="{{ route('stocks.index') }}">
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

        <table id="stocks-table" class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Stock Initial</th>
                    <th>Entrées</th>
                    <th>Sorties</th>
                    <th>Stock Final</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stocks as $stock)
                    <tr>
                        <td>{{ $stock->product->description }}</td>
                        <td>{{ $stock->initial_stock }}</td>
                        <td>{{ $stock->entries }}</td>
                        <td>{{ $stock->exits }}</td>
                        <td>{{ $stock->final_stock }}</td>
                        <td>{{ $stock->operation_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
