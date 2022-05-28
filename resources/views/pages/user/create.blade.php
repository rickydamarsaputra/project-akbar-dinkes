@extends('layout.dashboard')
@section('title', 'Tambah Data User')

@section('content')
<div class="section-header">
  <h1>Tambah Data User</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('user.create.action') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username..." autofocus>
          @error('username')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
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
        <button type="submit" class="btn btn-primary btn_confirm">Tambah User</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event) {
    const question = confirm('apakah anda yakin menambahkan data user?');
    if (question) {
      return;
    } else {
      event.preventDefault();
    }
  });
</script>
@endpush