@extends('layout.auth')
@section('title', 'Login')

@section('content')
<div class="row">
  <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

    <div class="card card-primary">
      <div class="card-header"><h4>Login</h4></div>

      <div class="card-body">
        <form action="{{ route('auth.login.action') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="masukkan email..." autofocus>
            @error('email')<small class="form-text text-danger">{{ $message }}</small>@enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password..." autofocus>
            @error('password')<small class="form-text text-danger">{{ $message }}</small>@enderror
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>

      </div>
    </div>
    <div class="simple-footer">
      Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}
    </div>
  </div>
</div>
@endsection