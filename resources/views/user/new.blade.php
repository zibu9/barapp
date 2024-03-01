@extends('layouts.app')
@section('title', 'Free Trial')
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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Plans</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="row">
            <div class="col-md-4">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-warning text-center">
                    <h5 class="font-weight-bold">Free Trial</h5>
                </div>
                <div class="card-body p-0">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Accès gratuit pendant 8 jours. <span class="float-right badge bg-primary">8j</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Gestion des produits. <span class="float-right badge bg-info">5max</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Fonctionnalités de base de gestion des stocks. <span class="float-right badge bg-success">4</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Gestion des ventes au détail uniquement. <span class="float-right badge bg-danger">1</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-footer p-0 text-center">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#" class="btn btn-sm btn-warning">
                                Free Trial
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
            </div>
        </div>
    </section>
@endsection
