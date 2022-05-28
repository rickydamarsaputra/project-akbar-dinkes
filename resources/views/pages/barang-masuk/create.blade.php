@extends('layout.dashboard')
@section('title', 'Tambah Data Barang Masuk')

@section('content')
<div class="section-header">
  <h1>Tambah Data Barang Masuk</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('barang-masuk.create.action') }}" method="post">
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
          <label for="rekening">Rekening</label>
          <select class="form-control" id="rekening" name="rekening">
            @foreach ($rekening as $loopItem)
              <option value="{{ $loopItem->id_rekening }}">{{ $loopItem->no_rekening }}</option>
            @endforeach
          </select>
          @error('rekening')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="unit_kerja">Unit Kerja</label>
          <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" placeholder="masukkan unit kerja...">
          @error('unit_kerja')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="nama_penyedia">Nama Penyedia</label>
          <select class="form-control" id="nama_penyedia" name="nama_penyedia">
            @foreach ($penyedia as $loopItem)
              <option value="{{ $loopItem->nama_penyedia }}">{{ $loopItem->nama_penyedia }}</option>
            @endforeach
          </select>
          @error('nama_penyedia')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="total_harga_barang_masuk">Total Harga Barang Masuk</label>
          <input type="number" class="form-control" id="total_harga_barang_masuk" name="total_harga_barang_masuk" placeholder="masukkan total harga barang masuk...">
          @error('total_harga_barang_masuk')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-primary btn_confirm">Tambah Data Barang Masuk</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event){
    const question = confirm('apakah anda yakin menambahkan data barang masuk?');
      if (question) {
        return;
      } else {
        event.preventDefault();
      }
  });
</script>
@endpush