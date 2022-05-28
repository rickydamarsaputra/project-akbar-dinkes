@extends('layout.dashboard')
@section('title', 'Ubah Data User')

@section('content')
<div class="section-header">
  <h1>Ubah Data User</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('user.update.action', $user->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" placeholder="masukkan username..." autofocus>
          @error('username')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="masukkan email..." autofocus>
          @error('email')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password..." autofocus>
          @error('password')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-success btn_confirm">Ubah User</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event) {
    const question = confirm('apakah anda yakin mengubah data user?');
    if (question) {
      return;
    } else {
      event.preventDefault();
    }
  });
</script>
@endpush