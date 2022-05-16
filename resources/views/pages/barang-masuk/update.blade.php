@extends('layout.dashboard')
@section('title', 'Ubah Data Barang Masuk')

@section('content')
<div class="section-header">
  <h1>Ubah Data Barang Masuk</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('barang-masuk.update.action', $barang_masuk->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="nama_barang">Nama Barang</label>
          <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang_masuk->nama_barang }}" placeholder="masukkan nama barang..." autofocus>
          @error('nama_barang')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="sumber_dana">Sumber Dana</label>
          <select class="form-control" id="sumber_dana" name="sumber_dana">
            @foreach ($sumber_dana as $loopItem)
              @if ($loopItem == $barang_masuk->sumber_dana)
                <option value="{{ $loopItem }}" selected>{{ $loopItem }}</option>
              @else
                <option value="{{ $loopItem }}">{{ $loopItem }}</option>
              @endif
            @endforeach
          </select>
          @error('sumber_dana')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="unit_kerja">Unit Kerja</label>
          <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="{{ $barang_masuk->unit_kerja }}" placeholder="masukkan unit kerja...">
          @error('unit_kerja')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="nama_penyedia">Nama Penyedia</label>
          <select class="form-control" id="nama_penyedia" name="nama_penyedia">
            @foreach ($penyedia as $loopItem)
              @if ($loopItem->nama_penyedia == $barang_masuk->nama_penyedia)
                <option value="{{ $loopItem->nama_penyedia }}" selected>{{ $loopItem->nama_penyedia }}</option>
              @else
                <option value="{{ $loopItem->nama_penyedia }}">{{ $loopItem->nama_penyedia }}</option>
              @endif
            @endforeach
          </select>
          @error('nama_penyedia')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="total_harga_barang_masuk">Total Harga Barang Masuk</label>
          <input type="number" class="form-control" id="total_harga_barang_masuk" name="total_harga_barang_masuk" value="{{ $barang_masuk->total_harga_barang_masuk }}" placeholder="masukkan total harga barang masuk...">
          @error('total_harga_barang_masuk')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-success btn_confirm">Ubah Data Barang Masuk</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event){
    const question = confirm('apakah anda yakin ubah data barang masuk?');
      if (question) {
        return;
      } else {
        event.preventDefault();
      }
  });
</script>
@endpush