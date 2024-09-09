@extends('layouts.app')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('title', 'Home')
@section('main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Utilisateurs</a></li>
                        <li class="breadcrumb-item active">Nouvel</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Ajouter Utilisateur</h3>
                    </div>
                    <form action="{{ route('admin.user.store') }}" method="POST">
                        @csrf
                        <div class="card-body row">
                            <div class="form-group col-md-4">
                                <label>Role</label>
                                <select class="form-control" name="role_id">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->content }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Prenom</label>
                                <input name="name" type="text" class="form-control" placeholder="Prenom" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="firstname">Nom</label>
                                <input name="firstname" type="text" class="form-control" placeholder="Nom" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="username">Nom Utilisateur</label>
                                <input name="username" type="text" class="form-control" placeholder="Nom Utilisateur" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="phone">Téléphone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Ex: 82XXXXXXX" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password">Mot de passe</label>
                                <input name="password" type="password" class="form-control" placeholder="Mot de passe" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="password_confirmation">Confirmer mot de passe</label>
                                <input name="password_confirmation" type="password" class="form-control" placeholder="Confirmer le mot de passe" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
