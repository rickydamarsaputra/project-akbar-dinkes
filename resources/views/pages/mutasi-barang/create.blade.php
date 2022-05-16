@extends('layout.dashboard')
@section('title', 'Tambah Data Mutasi Barang')

@section('content')
<div class="section-header">
  <h1>Tambah Data Mutasi Barang</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('mutasi-barang.create.action') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="sumber_dana">Sumber Dana</label>
          <select class="form-control" id="sumber_dana" name="sumber_dana">
            <option value="APBD">APBD</option>
            <option value="BLUD">BLUD</option>
            <option value="HIBAH">HIBAH</option>
            <option value="BTT">BTT</option>
            <option value="DROPPING">DROPPING</option>
          </select>
          @error('sumber_dana')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="tujuan_penerima">Tujuan Penerima</label>
          <input type="text" class="form-control" id="tujuan_penerima" name="tujuan_penerima" placeholder="masukkan tujuan penerima...">
          @error('tujuan_penerima')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="total_harga_mutasi">Total Harga Mutasi</label>
          <input type="number" class="form-control" id="total_harga_mutasi" name="total_harga_mutasi" placeholder="masukkan total harga mutasi...">
          @error('total_harga_mutasi')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary btn_confirm">Tambah Data Mutasi Barang</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event){
    const question = confirm('apakah anda yakin menambahkan data mutasi barang?');
      if (question) {
        return;
      } else {
        event.preventDefault();
      }
  });
</script>
@endpush