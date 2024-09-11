@extends('layouts.app')

@section('title', 'Créer Transaction')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('main')
<section class="content">
    <div class="container-fluid">
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="product_id">Produit</label>
                <!-- Use Select2 here -->
                <select name="product_id" class="form-control select2" required  style="width: 100%;">
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control" required>
                    <option value="gros">Gros</option>
                    <option value="details">Détails</option>
                </select>
            </div>

            <div class="form-group">
                <label for="designation">Désignation</label>
                <select name="designation" class="form-control" required>
                    <option value="entrée">Entrée</option>
                    <option value="sortie">Sortie</option>
                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantité</label>
                <input type="number" name="quantity" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="purchase_price_per_locker">Prix d'achat par casier</label>
                <input type="text" name="purchase_price_per_locker" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sale_price_per_locker">Prix de vente par casier</label>
                <input type="text" name="sale_price_per_locker" class="form-control" required>
            </div>

            <!-- Add other fields similarly -->

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</section>
@endsection

@section('script')
    <!-- Include Select2 JS -->
    <!-- Select2 -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        });
    </script>
@endsection
