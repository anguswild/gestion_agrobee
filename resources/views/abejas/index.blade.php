@extends('layouts.app')

@section('pageTitle', 'Abejas')
@section('icon')
<i class="fas fa-bug"></i>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Listado de Abejas</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-bordered" id="abejas">
      <thead>
        <tr>
          <th>ID</th>
          <th>Empresa</th>
          <th>Tipo de Contrato</th>
          <th>Encargado</th>
          <th>Fecha</th>
          <th>Sector de Polinización</th>
          <th>Tipo de colmena</th>
          <th>Cantidad de colmenas</th>
          <th>Cultivo</th>
          <th>Observaciones</th>
          <th>Responsable de entrega</th>
          <th>PDF</th>
          @can('abejas-editar')
          <th>Editar</th>
          @endcan
          @can('abejas-borrar')
          <th>Borrar</th>
          @endcan
        </tr>
      </thead>
      <tbody>
        @foreach ($abejas as $abeja)
        <tr>
          <td>{{ $abeja->id }}</td>
          <td>{{ $abeja->Empresa->nombre }}</td>
          <td>{{ $abeja->tipo_contrato }}</td>
          <td>{{ $abeja->Encargado->name }}</td>
          <td>@if($abeja->fecha_postura != NULL || $abeja->fecha_postura != '' ){{Carbon\Carbon::parse($abeja->fecha_postura)->format('d/m/Y')}}@endif</td>
          <td>{{ $abeja->sector_polinizacion }}</td>
          <td>{{ $abeja->tipo_colmena }}</td>
          <td>{{ $abeja->cantidad_colmenas }}</td>
          <td>{{ $abeja->cultivo }}</td>
          <td>{{ $abeja->observaciones }}</td>
          <td>{{ $abeja->responsable_entrega }}</td>
          <td>
          <a href="{{route('abejas.pdf', $abeja->id) }}" class='btn btn-info' target="_blank"><i class="fas fa-file-pdf"></i></a>
          </td>
          @can('abejas-editar')
          <td>
            <button class='btn btn-primary' data-remote='false' data-toggle='modal' data-target='#edit_abeja' data-id='{{$abeja->id}}'> <i class='fas fa-edit' aria-hidden='true'></i></button>
          </td>
          @endcan
          @can('abejas-borrar')
          <td>
            <button class='btn btn-danger' data-remote='false' data-toggle='modal' data-target='#delete_abeja' data-id='{{$abeja->id}}'> <i class='fas fa-trash' aria-hidden='true'></i></button>
          </td>
          @endcan
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>


@include('abejas.modals')

@endsection

@section('scripts')
<script>
  $("#abejas").DataTable({
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
      title: 'Informe Abejas',
      exportOptions: {
        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9]
      }
    }]
  });

  $('#edit_abeja').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);
    $.ajax({
      type: "GET",
      url: 'abejas/' + id + '/edit',
      cache: false,
      success: function(data) {
        modal.find('.load_modal').html(data);
      },
      error: function(err) {
        console.log(err);
      }
    });
  });

  $('#delete_abeja').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var modal = $(this);

    $.ajax({
      type: "GET",
      url: 'abejas/' + id + '/delete',
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