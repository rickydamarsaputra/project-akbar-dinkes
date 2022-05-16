@extends('layout.dashboard')
@section('title', 'Detail Data Barang Masuk')

@section('content')
<div class="section-header">
  <h1>Detail Data Barang Masuk</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang_masuk->nama_barang }}" readonly>
      </div>
      <div class="form-group">
        <label for="sumber_dana">Sumber Dana</label>
        <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" value="{{ $barang_masuk->sumber_dana }}" readonly>
      </div>
      <div class="form-group">
        <label for="unit_kerja">Unit Kerja</label>
        <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="{{ $barang_masuk->unit_kerja }}" readonly>
      </div>
      <div class="form-group">
        <label for="nama_penyedia">Nama Penyedia</label>
        <input type="text" class="form-control" id="nama_penyedia" name="nama_penyedia" value="{{ $barang_masuk->nama_penyedia }}" readonly>
      </div>
      <div class="form-group">
        <label for="total_harga_barang_masuk">Total Harga Barang Masuk</label>
        <input type="text" class="form-control" id="total_harga_barang_masuk" name="total_harga_barang_masuk" value="{{ $barang_masuk->total_harga_barang_masuk }}" readonly>
      </div>
    </div>
  </div>
</div>
@endsection