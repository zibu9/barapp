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
                        <li class="breadcrumb-item active">Boissons</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="container-fluid">
            <a href="{{ route('admin.products.create') }}" class="btn bg-primary mb-2 disable-on-load"><i class="fas fa-plus"></i></a>
            <div class="card card-success">
               <div class="card-header">
                 <h3 class="card-title">Les Boissons</h3>
               <div class="card-tools">
                 <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                 </button>
                 <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                 </button>
               </div>
             </div>



               <div class="card-body">
                    <div class="row">

                       <div class="container table-responsive">
                         <table class="table table-striped table-dark table-bordered">
                           <thead>
                                <tr style="font-weight: bold;" class="bg-info">
                                    <th scope="col">Code</th>
                                    <td class="text-center">Designation</td>
                                    <td class="text-center">Casier</td>
                                    <td class="text-center">PAU</td>
                                    <td class="text-center">PAC</td>
                                    <td class="text-center">PVU</td>
                                    <td class=" text-center">PVC</td>
                                    <td class=" text-center"></td>
                                </tr>
                            </thead>
                            @php
                                $i=0;
                            @endphp
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                         <th scope="row">{{ $i+1 }}</th>
                                         <td class="text-center">{{ $product->description }}</td>
                                         <td class="text-center">{{ $product->quantite }}</td>
                                         <td class="text-center">{{ round($product->purchase_price_per_bottle, 0) }}</td>
                                         <td class="text-center">{{ round($product->purchase_price_per_locker, 0) }}</td>
                                         <td class="text-center">{{ round($product->selling_price_per_bottle, 0) }}</td>
                                         <td class="text-center">{{ round($product->sale_price_per_locker, 0) }}</td>
                                         <td class=" text-center"><a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-info">Edit</a></td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                    @endforeach

                                </tbody>
                           </table>
                         </div>
                      </div>

               </div>

               <!-- /.card-body -->

             </div>
             <!-- /.card -->
         </div>
    </section>
@endsection
