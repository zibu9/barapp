@extends('layouts.app')
@section('css')
      <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection
@section('title', 'Home')
@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Acceuil</a></li>
                    <li class="breadcrumb-item"><a href="">Utilisateurs</a></li>
                    <li class="breadcrumb-item active">Nouvel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        {{ session('success') }}
                    </div>
                @endif
                <!-- Le reste de votre contenu -->
            </div>
            <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card card-primary">
                        <div class="card-header">
                        <h3 class="card-title">Ajouter Utilisateur</h3>
                        </div>
                        <!-- /.card-header -->
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
                                <input name="name" type="text" class="form-control" id="name" placeholder="Prenom">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="firstname">Nom</label>
                                <input name="firstname" type="text" class="form-control" placeholder="nom">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="username">Nom Utilisateur</label>
                                <input name="username" type="text" class="form-control" placeholder="Nom Utilisateur">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Télephone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Ex : 82XXXXXXX">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button wire:click.live="submitForm" class="btn btn-primary">Ajouter</button>
                        </div>
                    </div>
                </div>
            <!-- /.col-->
        </div>
        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection
