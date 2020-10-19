@extends('layouts.app')

@section('pageTitle', 'Empresas')
@section('icon')
<i class="fas fa-address-book"></i>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Listado de Empresas</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered" id="empresas" style="width:100%;">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Rut</th>
          <th>Dirección</th>
          <th>Giro</th>
          @can('empresas-editar')
          <th>Editar</th>
          @endcan
          @can('empresas-borrar')
          <th>Borrar</th>
          @endcan
        </tr>
      </thead>
      <tbody>
        @foreach ($empresas as $empresa)
        <tr>
          <td>{{ $empresa->id }}</td>
          <td>{{ $empresa->nombre }}</td>
          <td>{{ $empresa->rut }}</td>
          <td>{{ $empresa->direccion }}</td>
          <td>{{ $empresa->giro }}</td>
          @can('empresas-editar')
          <td>
            <button class='btn btn-primary' data-remote='false' data-toggle='modal' data-target='#edit_empresa' data-id='{{$empresa->id}}'> <i class='fas fa-edit' aria-hidden='true'></i></button>
          </td>
          @endcan
          @can('empresas-borrar')
          <td>
            <button class='btn btn-danger' data-remote='false' data-toggle='modal' data-target='#delete_empresa' data-id='{{$empresa->id}}'> <i class='fas fa-trash' aria-hidden='true'></i></button> 
          </td>
          @endcan
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@include('empresas.modals')

@endsection

@section('scripts')
<script>
  $("#empresas").DataTable({
    dom:  "<'row'<'col-md-12'B>>" +
    "<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'l>>" +
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
    responsive: true,
    buttons: [{
      extend: 'excel',
      text: 'Excel',
      title: 'Informe Empresas',
      exportOptions: {
        columns: [0, 1, 2, 3, 4]
      }
    }]
  });

  $('#edit_empresa').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    $.ajax({
      type: "GET",
      url: 'empresas/' + id + '/edit',
      cache: false,
      success: function(data) {
        modal.find('.load_modal').html(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  $('#delete_empresa').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);

    $.ajax({
      type: "GET",
      url: 'empresas/' + id + '/delete',
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