@extends('layout.dashboard')
@section('title', 'Daftar Data Barang Masuk')

@section('content')
<div class="section-header d-flex justify-content-between">
  <h1>Daftar Data Barang Masuk</h1>
  <a href="{{ route('export.barang.masuk') }}" class="btn btn-success">Export Excel</a>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="barang_masuk_datatables">
          <thead>
            <tr>
              <th class="text-center">
                #
              </th>
              <th>Nama Barang</th>
              <th>Sumber Dana</th>
              <th>Unit Kerja</th>
              <th>Nama Penyedia</th>
              <th>Total Harga</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
  const DATATABLES_URL_AJAX = "{{ route('barang-masuk.datatables') }}";
  $('#barang_masuk_datatables').DataTable({
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: DATATABLES_URL_AJAX,
    columns: [
      {
        data: 'DT_RowIndex',
        orderable: false,
        searchable: false
      },
      {
        data: 'nama_barang'
      },
      {
        data: 'sumber_dana'
      },
      {
        data: 'unit_kerja'
      },
      {
        data: 'nama_penyedia'
      },
      {
        data: 'total_harga_barang_masuk'
      },
      {
        data: 'id',
        render: function(data){
          let DELETE_URL = "{{ route('barang-masuk.delete.action', ':id') }}";
          let UPDATE_URL = "{{ route('barang-masuk.update.view', ':id') }}";
          let DETAIL_URL = "{{ route('barang-masuk.detail.view', ':id') }}";
          
          DELETE_URL = DELETE_URL.replace(':id', data);
          UPDATE_URL = UPDATE_URL.replace(':id', data);
          DETAIL_URL = DETAIL_URL.replace(':id', data);

          return `
            <a class="btn btn-success btn-sm text-capitalize" href="${UPDATE_URL}">update</a>
            <a class="btn btn-danger btn-sm text-capitalize mx-2 btn_confirm" href="${DELETE_URL}">delete</a>
            <a class="btn btn-info btn-sm text-capitalize" href="${DETAIL_URL}">detail</a>
          `;
        }
      }
    ],
    initComplete: function(settings, json) {
      $('.btn_confirm').each(function(index){
          $(this).on('click', function(event){
            const question = confirm('apakah anda yakin menghapus data barang masuk ini?');
            
            if(question){
              return;
            }else{
              event.preventDefault();
            }
          });
      });
    },
  });
</script>
@endpush