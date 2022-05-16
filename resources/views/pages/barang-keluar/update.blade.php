@extends('layout.dashboard')
@section('title', 'Ubah Data Barang Keluar')

@section('content')
<div class="section-header">
  <h1>Ubah Data Barang Keluar</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('barang-keluar.update.action', $barang_keluar->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="nama_barang">Nama Barang</label>
          <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang_keluar->nama_barang }}" placeholder="masukkan nama barang..." autofocus>
          @error('nama_barang')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="sumber_dana">Sumber Dana</label>
          <select class="form-control" id="sumber_dana" name="sumber_dana">
            @foreach ($sumber_dana as $loopItem)
              @if ($loopItem == $barang_keluar->sumber_dana)
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
          <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="{{ $barang_keluar->unit_kerja }}" placeholder="masukkan unit kerja...">
          @error('unit_kerja')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="tujuan">Tujuan</label>
          <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $barang_keluar->tujuan }}" placeholder="masukkan unit kerja...">
          @error('tujuan')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-success btn_confirm">Ubah Data Barang Keluar</button>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event){
    const question = confirm('apakah anda yakin ubah data barang keluar?');
      if (question) {
        return;
      } else {
        event.preventDefault();
      }
  });
</script>
@endpush