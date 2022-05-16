@extends('layout.dashboard')
@section('title', 'Tambah Data Barang Keluar')

@section('content')
<div class="section-header">
  <h1>Tambah Data Barang Keluar</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('barang-keluar.create.action') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="nama_barang">Nama Barang</label>
          <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="masukkan nama barang..." autofocus>
          @error('nama_barang')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
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
          <label for="unit_kerja">Unit Kerja</label>
          <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" placeholder="masukkan unit kerja...">
          @error('unit_kerja')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="tujuan">Tujuan</label>
          <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="masukkan tujuan...">
          @error('tujuan')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary btn_confirm">Tambah Data Barang Keluar</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event){
    const question = confirm('apakah anda yakin menambahkan data barang keluar?');
      if (question) {
        return;
      } else {
        event.preventDefault();
      }
  });
</script>
@endpush