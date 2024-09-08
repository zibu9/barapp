@extends('layouts.app')
@section('title', 'Dashborad')
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
                        <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Utilisateurs</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0" style="height: 400px;">
                        <table class="table table-head-fixed text-nowrap">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Noms</th>
                              <th>Role</th>
                              <th>Status</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($users as $user)
                            <tr>
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name. " ". $user->firstname }}</td>
                              <td>{{ $user->role->content }}</td>
                              <td><span class="tag tag-success">{{ $user->status == 1 ? "Actif" : "Bloqué" }}</span></td>
                              <td class="">
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Bloquer
                                    </a>
                                 </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
            </div>
        </div>
    </section>
@endsection
