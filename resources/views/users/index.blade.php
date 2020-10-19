@extends('layouts.app')

@section('pageTitle', 'Usuarios')
@section('icon')
<i class="fas fa-users"></i>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Listado de Usuarios</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered" id="usuarios">
      <thead>
        <tr>
          <th>ID</th>
          <th>Usuario</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Roles</th>
          <th>Estatus</th>
          <th>Detalles</th>
          <th>Editar</th>
          <th>Borrar</th>

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
            @if($user->isOnline())
            <label class="badge badge-success">Online</label>
            @else
            <label class="badge badge-danger">Offline</label>
            @endif
          </td>
          <td>
            <button class='btn btn-success' data-remote='false' data-toggle='modal' data-target='#detalles_user' data-id='{{$user->id}}'> <i class="fas fa-info"></i></button>
          </td>
          <td>
            @can('usuarios-editar')
            <button class='btn btn-primary' data-remote='false' data-toggle='modal' data-target='#edit_user' data-id='{{$user->id}}'> <i class='fas fa-edit' aria-hidden='true'></i></button>
            @endcan
          </td>
          <td>
            @can('usuarios-borrar')
            <button class='btn btn-danger' data-remote='false' data-toggle='modal' data-target='#delete_user' data-id='{{$user->id}}'> <i class='fas fa-trash' aria-hidden='true'></i></button>
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

$("#usuarios").DataTable({
    dom: "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'l>>" +
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
  $('#edit_user').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this);
    $.ajax({
      type: "GET",
      url: 'users/' + id + '/edit',
      cache: false,
      success: function(data) {
        modal.find('.load_modal').html(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  $('#delete_user').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this);

    $.ajax({
      type: "GET",
      url: 'users/' + id + '/delete',
      cache: false,
      success: function(data) {
        modal.find('.load_modal').html(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  $('#detalles_user').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this);

    $.ajax({
      type: "GET",
      url: 'users/' + id + '',
      cache: false,
      success: function(data) {
        modal.find('.load_modal').html(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  });
</script>
@endsection