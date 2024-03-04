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
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Admin</a></li>
                        <li class="breadcrumb-item">Boissons</li>
                        <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container-fluid">
            <!-- row -->
              <div class="row">
                            <!-- left column -->
              <div class="col-md-3"></div>
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Nouvel Agent</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" method="POST" action="http://127.0.0.1:3000/salonabb/admin/new_agent">
                    <div class="card-body">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Nom</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Name" name="nom">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Postnom</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Last Name" name="postnom">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Prenom</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Surname" name="prenom">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Salaire Fixe</span>
                      </div>
                      <input type="text" class="form-control" placeholder="Salaire fixe" name="safi">
                    </div>


                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Taux prestation</span>
                      </div>
                      <input type="hidden" class="form-control" placeholder="exemple 0.3 pour 30%" name="taux_pres">
                    </div>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Prime</span>
                      </div>
                      <input type="text" class="form-control" placeholder="prime" name="prime">
                    </div>

                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Categorie</span>
                          </div>
                            <select class="custom-select" name="categorie">
                              <option>Salon Homme</option>
                              <option>Salon Femme</option>
                              <option>homme_huilerie</option>
                              <option>Mixte</option>
                              <option>Autre</option>
                            </select>
                    </div>

                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Type d'agent</span>
                          </div>
                        <select class="custom-select" name="type">
                            <option>Coiffeur</option>
                            <option>Barman</option>
                            <option>Receptionniste</option>
                            <option>Receptionniste Coiffeuse</option>
                            <option>Receptioniste Barman</option>
                            <option>Chargé de la Sécurité</option>
                            <option>Chargé d'approvisionnement et Caisses</option>
                            <option>Gérant - Contrôleur de gestion</option>
                            <option>Réceptionniste - Salon Dames &amp; Maquilleuse</option>
                            <option>Coiffeuse</option>
                            <option>Vernisseur</option>
                        </select>
                    </div>
                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Creer</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->

              </div>
              <!--/.col (left) -->


              </div>
              <!-- /row -->
          </div>
    </section>
@endsection
