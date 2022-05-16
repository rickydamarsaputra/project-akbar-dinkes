@extends('layout.dashboard')
@section('title', 'Detail Data Barang Keluar')

@section('content')
<div class="section-header">
  <h1>Detail Data Barang Keluar</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang_keluar->nama_barang }}" readonly>
      </div>
      <div class="form-group">
        <label for="sumber_dana">Sumber Dana</label>
        <input type="text" class="form-control" id="sumber_dana" name="sumber_dana" value="{{ $barang_keluar->sumber_dana }}" readonly>
      </div>
      <div class="form-group">
        <label for="unit_kerja">Unit Kerja</label>
        <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" value="{{ $barang_keluar->unit_kerja }}" readonly>
      </div>
      <div class="form-group">
        <label for="tujuan">Tujuan</label>
        <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $barang_keluar->tujuan }}" readonly>
      </div>
    </div>
  </div>
</div>
@endsection