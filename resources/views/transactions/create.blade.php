@extends('layouts.app')

@section('title', 'Créer Transaction')

@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('main')
<section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin</a></li>
                    <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible">
                {{ session('success') }}
            </div>
        @endif
        <!-- Le reste de votre contenu -->
        @if ($errors->has('message'))
            <div class="alert alert-danger">
                {{ $errors->first('message') }}
            </div>
        @endif
    </div>
    <div class="container-fluid">


        <form action="{{ route('manager.transactions.store') }}" method="POST">
            @csrf
            <div class="card-body row">
                <div class="form-group col-md-12">
                    <label for="operation_date">Date Operation</label>
                    <input type="date" name="operation_date" class="form-control" value="{{ old('operation_date') }}" required>
                    @error('operation_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="product_id">Produit</label>
                    <!-- Select2 pour la sélection des produits -->
                    <select name="product_id" class="form-control select2" required style="width: 100%;">
                        <option value="">-- Sélectionner un produit --</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->description }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="type">Type</label>
                    <select name="type" class="form-control" required>
                        <option value="gros" {{ old('type') == 'gros' ? 'selected' : '' }}>Gros</option>
                        <option value="details" {{ old('type') == 'details' ? 'selected' : '' }}>Détails</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="designation">Désignation</label>
                    <select name="designation" class="form-control" required>
                        <option value="entrée" {{ old('designation') == 'entrée' ? 'selected' : '' }}>Entrée</option>
                        <option value="sortie" {{ old('designation') == 'sortie' ? 'selected' : '' }}>Sortie</option>
                    </select>
                    @error('designation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="quantity">Quantité</label>
                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="purchase_price_per_locker">Prix d'achat par casier</label>
                    <input type="text" name="purchase_price_per_locker" id="purchase_price_per_locker" class="form-control" value="{{ old('purchase_price_per_locker') }}" required readonly>
                    @error('purchase_price_per_locker')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="sale_price_per_locker">Prix de vente par casier</label>
                    <input type="text" name="sale_price_per_locker" id="sale_price_per_locker" class="form-control" value="{{ old('sale_price_per_locker') }}" required readonly>
                    @error('sale_price_per_locker')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="purchase_price_per_bottle">Prix d'achat par bouteille</label>
                    <input type="text" name="purchase_price_per_bottle" id="purchase_price_per_bottle" class="form-control" value="{{ old('purchase_price_per_bottle') }}" required readonly>
                    @error('purchase_price_per_bottle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="selling_price_per_bottle">Prix de vente par Bouteille</label>
                    <input type="text" name="selling_price_per_bottle" id="selling_price_per_bottle" class="form-control" value="{{ old('selling_price_per_bottle') }}" required readonly>
                    @error('selling_price_per_bottle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary m-2">Enregistrer</button>
            </div>


        </form>
    </div>
</section>
@endsection

@section('script')
    <!-- Include Select2 JS -->
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });

            $('select[name="product_id"]').on('change', function() {
                let productId = $(this).val();
                if (productId) {
                    $.ajax({
                        url: '/products/' + productId + '/prices',
                        type: 'GET',
                        success: function(data) {
                            $('#purchase_price_per_locker').val(data.purchase_price_per_locker);
                            $('#sale_price_per_locker').val(data.sale_price_per_locker);
                            $('#purchase_price_per_bottle').val(data.purchase_price_per_bottle);
                            $('#selling_price_per_bottle').val(data.selling_price_per_bottle);
                        },
                        error: function() {
                            alert('Erreur lors de la récupération des prix du produit.');
                        }
                    });
                }
            });
        });
    </script>
@endsection
