@extends('layout.dashboard')
@section('title', 'Tambah Data Penyedia')

@section('content')
<div class="section-header">
  <h1>Tambah Data Penyedia</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('penyedia.create.action') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="nama_penyedia">Nama Penyedia</label>
          <input type="text" class="form-control" id="nama_penyedia" name="nama_penyedia" placeholder="masukkan nama penyedia..." autofocus>
          @error('nama_penyedia')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary btn_confirm">Tambah Data Penyedia</button>
      </form>
    </div>
  </div>
</div>
@endsection


@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event){
    const question = confirm('apakah anda yakin menambahkan data penyedia?');
      if (question) {
        return;
      } else {
        event.preventDefault();
      }
  });
</script>
@endpush