@extends('layout.dashboard')
@section('title', 'Detail Data Penyedia')

@section('content')
<div class="section-header">
  <h1>Detail Data Penyedia</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <label for="nama_penyedia">Nama Penyedia</label>
        <input type="text" class="form-control" id="nama_penyedia" name="nama_penyedia" value="{{ $penyedia->nama_penyedia }}" readonly>
      </div>
    </div>
  </div>
</div>
@endsection