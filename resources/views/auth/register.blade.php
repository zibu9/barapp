@extends('auth.template')

@section('title', 'Register page')

@section('main')
<div class="register-box">
    <div class="login-logo">
        {{-- <img src="{{ asset('dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-c"
        style="opacity: .8"> --}}
        <a href="" class="brand-link" style="text-decoration: none;">
            <h1 class="font-weight-bold text-primary">Bar<span class="brand-text font-weight-bold text-danger">APP</span><br></h1>
        </a>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="{{ route('register') }}" method="post">
            @csrf
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="name" name="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('firstname')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="First Name" name="firstname">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          @error('email')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @error('phone')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="PhoneNumber" name="phone">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>

          @error('password')
          <div class="text-danger">{{ $message }}</div>
          @enderror
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
                <a href="{{ route('login') }}" class="text-center">I already have an account</a>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

@endsection
