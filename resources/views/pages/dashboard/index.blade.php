@extends('layout.dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="section-header d-flex justify-content-between">
  <h1>Dashboard</h1>
  {{-- <a href="{{ route('export-report') }}" class="btn btn-success">Export Excel Report</a> --}}
</div>

<div class="section-body">
  <div class="row">
    <div class="col-lg">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-credit-card"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Saldo Awal</h4>
          </div>
          <div class="card-body">
            {{ 'Rp.' . number_format($saldo_awal) }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-credit-card"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Saldo Akhir</h4>
          </div>
          <div class="card-body">
            {{ 'Rp.' . number_format($saldo_akhir) }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fa-solid fa-boxes-stacked text-white" style="font-size: 1.5rem"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Barang</h4>
          </div>
          <div class="card-body">
            {{ $total_barang }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fa-solid fa-people-carry-box text-white" style="font-size: 1.5rem"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Penyedia</h4>
          </div>
          <div class="card-body">
            {{ $total_penyedia }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection