@extends('layout.dashboard')
@section('title', 'Tambah Data Rekening')

@section('content')
<div class="section-header">
  <h1>Tambah Data Rekening</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('rekening.create.action') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="no_rekening">Nomor Rekening</label>
          <input type="text" class="form-control" id="no_rekening" name="no_rekening" placeholder="masukkan nomor rekening..." autofocus>
          @error('no_rekening')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="saldo_rekening">Saldo Rekening</label>
          <input type="number" class="form-control" id="saldo_rekening" name="saldo_rekening" placeholder="masukkan saldo rekening...">
          @error('saldo_rekening')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary btn_confirm">Tambah Data Rekening</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event){
    const question = confirm('apakah anda yakin menambahkan data rekening?');
      if (question) {
        return;
      } else {
        event.preventDefault();
      }
  });
</script>
@endpush