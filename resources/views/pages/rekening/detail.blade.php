@extends('layout.dashboard')
@section('title', 'Detail Data Rekening')

@section('content')
<div class="section-header">
  <h1>Detail Data Rekening</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="form-group">
        <label for="no_rekening">Nomor Rekening</label>
        <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="{{ $rekening->no_rekening }}" readonly>
      </div>
      <div class="form-group">
        <label for="saldo_rekening">Saldo Rekening</label>
        <input type="text" class="form-control" id="saldo_rekening" name="saldo_rekening" value="{{ $rekening->saldo_rekening }}" readonly>
      </div>
    </div>
  </div>
</div>
@endsection