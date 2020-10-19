@extends('layouts.app')

@section('pageTitle', 'Recuperar Usuarios')
@section('icon')
<i class="fas fa-users"></i>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Listado de Usuarios Eliminados</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered" id="usuarios_eliminados">
     <thead>
     <tr>
       <th>ID</th>
       <th>Usuario</th>
       <th>Nombre</th>
       <th>Email</th>
       <th>Roles</th>
       <th>Recuperar</th>

     </tr>
     </thead>
     <tbody>
     @foreach ($data as $key => $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(!empty($user->getRoleNames()))
            @foreach($user->getRoleNames() as $v)
               <label class="badge badge-primary">{{ $v }}</label>
            @endforeach
          @endif
        </td>
        <td>
          @can('usuarios-borrar')
            <button class='btn btn-danger' data-remote='false' data-toggle='modal' data-target='#undelete_user' data-id='{{$user->id}}'> <i class="fas fa-trash-restore"></i></button>
          @endcan
        </td>
      </tr>
     @endforeach
     </tbody>
    </table>
  </div>
</div>


@include('users.modals')
@endsection

@section('scripts')
<script>
  $("#usuarios_eliminados").DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
      "<'row'<'col-sm-12'tr>>" +
      "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
    language: {
      url: "{{ asset('js/Spanish.json') }}"
    },
    paging: true,
    lengthChange: true,
    searching: true,
    ordering: false,
    info: true,
    autoWidth: false,
    responsive: true
  });

$('#undelete_user').on('show.bs.modal', function (event) {
   var button = $(event.relatedTarget)
   var id = button.data('id')
   var modal = $(this);

   $.ajax({
       type: "GET",
       url: id + '/undelete',
       cache: false,
       success: function (data) {
           modal.find('.load_modal').html(data);
       },
       error: function (err) {
           console.log(err);
       }
   });
});

</script>
@endsection
