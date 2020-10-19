@extends('layouts.app')

@section('pageTitle', 'Aplicaciones')
@section('icon')
<i class="fas fa-tint"></i>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Listado de Aplicaciones</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered" id="aplicaciones">
      <thead>
        <tr>
          <th>ID</th>
          <th>Empresa</th>
          <th>Encargado</th>
          <th>Fecha de Aplicación</th>
          <th>Tipo de maquinaria</th>
          <th>Nombre del producto</th>
          <th>Dosis</th>
          <th>Cantidad de agua aplicada</th>
          <th>Cantidad de Hectáreas (HA)</th>
          <th>PDF</th>
          @can('aplicaciones-editar')
          <th>Editar</th>
          @endcan
          @can('aplicaciones-borrar')
          <th>Borrar</th>
          @endcan
        </tr>
      </thead>
      <tbody>
        @foreach ($aplicaciones as $aplicacion)
        <tr>
          <td>{{ $aplicacion->id }}</td>
          <td>{{ $aplicacion->Empresa->nombre }}</td>
          <td>{{ $aplicacion->Encargado->name }}</td>
          <td>@if($aplicacion->fecha_aplicacion != NULL || $abeja->fecha_postura != '' ){{Carbon\Carbon::parse($aplicacion->fecha_aplicacion)->format('d/m/Y')}}@endif</td>
          <td>{{ $aplicacion->tipo_maquinaria }}</td>
          <td>{{ $aplicacion->nombre_producto }}</td>
          <td>{{ $aplicacion->dosis }}</td>
          <td>{{ $aplicacion->cantidad_agua }}</td>
          <td>{{ $aplicacion->cantidad_hectareas }}</td>
          <td>
          <a href="{{route('aplicaciones.pdf', $aplicacion->id) }}" class='btn btn-info' target="_blank"><i class="fas fa-file-pdf"></i></a>
          </td>
          @can('aplicaciones-editar')
          <td>
            <button class='btn btn-primary' data-remote='false' data-toggle='modal' data-target='#edit_aplicacion' data-id='{{$aplicacion->id}}'> <i class='fas fa-edit' aria-hidden='true'></i></button>
          </td>
          @endcan
          @can('aplicaciones-borrar')
          <td>
            <button class='btn btn-danger' data-remote='false' data-toggle='modal' data-target='#delete_aplicacion' data-id='{{$aplicacion->id}}'> <i class='fas fa-trash' aria-hidden='true'></i></button>
          </td>
          @endcan
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@include('aplicaciones.modals')

@endsection

@section('scripts')
<script>
  $("#aplicaciones").DataTable({
    dom: "<'row'<'col-md-12'B>>" +
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
      title: 'Informe Aplicaciones',
      exportOptions: {
        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
      }
    }],
  });

  $('#edit_aplicacion').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    $.ajax({
      type: "GET",
      url: 'aplicaciones/' + id + '/edit',
      cache: false,
      success: function(data) {
        modal.find('.load_modal').html(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  $('#delete_aplicacion').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);

    $.ajax({
      type: "GET",
      url: 'aplicaciones/' + id + '/delete',
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