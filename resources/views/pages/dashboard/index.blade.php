@extends('layout.dashboard')
@section('title', 'Dashboard')

@section('content')
<div class="section-header d-flex justify-content-between">
  <h1>Dashboard</h1>
  <a href="{{ route('export-report') }}" class="btn btn-success">Export Excel Report</a>
</div>

<div class="section-body">
</div>
@endsection