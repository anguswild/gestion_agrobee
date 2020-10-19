@extends('layouts.app')

@section('pageTitle', 'Roles')
@section('icon')
<i class="fas fa-users"></i>
@endsection

@section('content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Listado de Roles</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>

  <div class="card-body">
    <table class="table table-bordered">
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Permisos</th>
        <th>Editar</th>
        <th>Borrar</th>
      </tr>
      @foreach ($roles as $key => $role)
      <tr>
        <td>{{ $role->id }}</td>
        <td>{{ $role->name }}</td>
        <td>
          @if( !empty($role->permissions()->pluck('name')) )
          @foreach($role->permissions()->pluck('name') as $p)
          <label class="badge badge-primary">{{ $p }}</label>
          @endforeach
          @endif
        </td>
        <td>
          @can('roles-editar')
          @if($role->name != 'Admin' || $role->name != 'Encargado de Campo')
          <button class='btn btn-primary' data-remote='false' data-toggle='modal' data-target='#edit_role' data-id='{{$role->id}}'> <i class='fas fa-edit' aria-hidden='true'></i></button>
          @endif
          @endcan
        </td>
        <td>
          @can('roles-borrar')
          @if($role->name != 'Admin')
          <button class='btn btn-danger' data-remote='false' data-toggle='modal' data-target='#delete_role' data-id='{{$role->id}}'> <i class='fas fa-trash' aria-hidden='true'></i></button>
          @endif
          @endcan
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@include('roles.modals')
@endsection

@section('scripts')
<script>
  $('#edit_role').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this);
    $.ajax({
      type: "GET",
      url: 'roles/' + id + '/edit',
      cache: false,
      success: function(data) {
        modal.find('.load_modal').html(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  $('#delete_role').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var modal = $(this);

    $.ajax({
      type: "GET",
      url: 'roles/' + id + '/delete',
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