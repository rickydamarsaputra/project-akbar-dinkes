@extends('layout.auth')
@section('title', 'Landing')

@section('content')
<div class="row">
  <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <div class="d-flex justify-content-center mb-4">
      <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="img-fluid" width="150px">
    </div>
    <h1 class="text-center">Sistem Informasi <br> E - Logistik</h1>
    <div class="d-flex justify-content-center mt-5">
      <a href="{{ route('auth.login.view') }}" class="btn btn-primary">Login</a>
    </div>
    <div class="simple-footer">
      Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}
    </div>
  </div>
</div>
@endsection