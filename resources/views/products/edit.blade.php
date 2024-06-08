@extends('layouts.app')
@section('title', 'Edit ')
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
                    <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="container-fluid">
      <!-- row -->
        <div class="row">
                      <!-- left column -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{ $product->description }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" method="POST" action="{{ route('admin.products.store') }}">
                @csrf
                    <div class="card-body">
              <div class="card-body row">
                @foreach ($fields as $field)
                    @if (!in_array($field, ['id', 'created_at', 'updated_at', 'deleted_at']))
                        @if ($field === 'type_id')
                        <div class="input-group mb-3 col-md-6">
                            <div class="input-group-prepend">
                            <span class="input-group-text">{{ __('products.fields.'.$field) }}</span>
                            </div>
                            <select class="custom-select" name="{{ $field }}">
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->content }}</option>
                                @endforeach
                            </select>
                        </div>
                        @else
                        <div class="input-group mb-3 col-md-6">
                            <div class="input-group-prepend">
                            <span class="input-group-text">{{ __('products.fields.'.$field) }}</span>
                            </div>
                            <input
                                type="text"
                                class="form-control @error($field) is-invalid @enderror"
                                placeholder="{{ __('products.fields.'.$field) }}"
                                name="{{ $field }}"
                                value="{{ $product->$field }}"

                            >
                        </div>
                        @endif
                    @endif

                @endforeach
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->


        </div>
        <!-- /row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
