@extends('layout.dashboard')
@section('title', 'Ubah Data Penyedia')

@section('content')
<div class="section-header">
  <h1>Ubah Data Penyedia</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('penyedia.update.action', $penyedia->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="nama_penyedia">Nama Penyedia</label>
          <input type="text" class="form-control" id="nama_penyedia" name="nama_penyedia" value="{{ $penyedia->nama_penyedia }}" placeholder="masukkan nama penyedia..." autofocus>
          @error('nama_penyedia')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-success btn_confirm">Ubah Data Penyedia</button>
      </form>
    </div>
  </div>
</div>
@endsection


@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event){
    const question = confirm('apakah anda yakin ubah data penyedia?');
      if (question) {
        return;
      } else {
        event.preventDefault();
      }
  });
</script>
@endpush