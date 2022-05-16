@extends('layout.dashboard')
@section('title', 'Detail Data Mutasi Barang')

@section('content')
<div class="section-header">
  <h1>Detail Data Mutasi Barang</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <label for="sumber_dana">Sumber Dana</label>
        <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" value="{{ $mutasi_barang->sumber_dana }}" readonly>
      </div>
      <div class="form-group">
        <label for="tujuan_penerima">Tujuan Penerima</label>
        <input type="text" class="form-control" id="tujuan_penerima" name="tujuan_penerima" value="{{ $mutasi_barang->tujuan_penerima }}" readonly>
      </div>
      <div class="form-group">
        <label for="total_harga_mutasi">Total Harga Mutasi</label>
        <input type="text" class="form-control" id="total_harga_mutasi" name="total_harga_mutasi" value="{{ $mutasi_barang->total_harga_mutasi }}" readonly>
      </div>
    </div>
  </div>
</div>
@endsection