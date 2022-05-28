@extends('layout.dashboard')
@section('title', 'Daftar Data User')

@section('content')
<div class="section-header">
  <h1>Daftar Data User</h1>
</div>

<div class="section-body">
  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="user_datatables">
          <thead>
            <tr>
              <th class="text-center">
                #
              </th>
              <th>Username</th>
              <th>Email</th>
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
  const DATATABLES_URL_AJAX = "{{ route('user.datatables') }}";
  $('#user_datatables').DataTable({
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
        data: 'username'
      },
      {
        data: 'email'
      },
      {
        data: 'id',
        render: function(data){
          let DELETE_URL = "{{ route('user.delete.action', ':id') }}";
          let UPDATE_URL = "{{ route('user.update.view', ':id') }}";
          
          DELETE_URL = DELETE_URL.replace(':id', data);
          UPDATE_URL = UPDATE_URL.replace(':id', data);

          return `
            <a class="btn btn-success btn-sm text-capitalize" href="${UPDATE_URL}">update</a>
            <a class="btn btn-danger btn-sm text-capitalize mx-2 btn_confirm" href="${DELETE_URL}">delete</a>
          `;
        }
      }
    ],
    initComplete: function(settings, json) {
      $('.btn_confirm').each(function(index){
          $(this).on('click', function(event){
            const question = confirm('apakah anda yakin menghapus data user ini?');
            
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