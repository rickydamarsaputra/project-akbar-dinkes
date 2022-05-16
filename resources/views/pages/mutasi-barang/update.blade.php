@extends('layout.dashboard')
@section('title', 'Ubah Data Mutasi Barang')

@section('content')
<div class="section-header">
  <h1>Ubah Data Mutasi Barang</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('mutasi-barang.update.action', $mutasi_barang->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
          <label for="sumber_dana">Sumber Dana</label>
          <select class="form-control" id="sumber_dana" name="sumber_dana">
            @foreach ($sumber_dana as $loopItem)
              @if ($loopItem == $mutasi_barang->sumber_dana)
                <option value="{{ $loopItem }}" selected>{{ $loopItem }}</option>
              @else
                <option value="{{ $loopItem }}">{{ $loopItem }}</option>
              @endif
            @endforeach
          </select>
          @error('sumber_dana')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="tujuan_penerima">Tujuan Penerima</label>
          <input type="text" class="form-control" id="tujuan_penerima" name="tujuan_penerima" value="{{ $mutasi_barang->tujuan_penerima }}" placeholder="masukkan tujuan penerima...">
          @error('tujuan_penerima')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <div class="form-group">
          <label for="total_harga_mutasi">Total Harga Mutasi</label>
          <input type="number" class="form-control" id="total_harga_mutasi" name="total_harga_mutasi" value="{{ $mutasi_barang->total_harga_mutasi }}" placeholder="masukkan total harga mutasi...">
          @error('total_harga_mutasi')<small class="form-text text-danger">{{ $message }}</small>@enderror
        </div>
        <button type="submit" class="btn btn-success btn_confirm">Ubah Data Mutasi Barang</button>
      </form>
    </div>
  </div>
</div>
@endsection


@push('scripts')
<script>
  $('.btn_confirm').on('click', function(event){
    const question = confirm('apakah anda yakin ubah data mutasi barang?');
      if (question) {
        return;
      } else {
        event.preventDefault();
      }
  });
</script>
@endpush