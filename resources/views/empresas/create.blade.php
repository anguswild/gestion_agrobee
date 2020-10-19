@extends('layouts.app')

@section('pageTitle', 'Empresas')
@section('icon')
<i class="fas fa-address-book"></i>
@endsection

@section('content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Crear Empresa</h5>
    <div class="header-elements">
      <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
              </div>
            </div>
  </div>

<div class="card-body">

  <form action="{{route('empresas.store') }}" method="post">
    @csrf

    <div class="form-group row">
      <label class="col-form-label col-lg-2">Nombre:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Rut:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="rut" id="rut" placeholder="Ingrese Rut">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Dirección:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Ingrese Dirección">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Giro:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="giro" id="giro" placeholder="Ingrese Giro">
      </div>
    </div>
    <div class="text-right">
			<button type="submit" class="btn btn-primary">Guardar <i class="icon-paperplane ml-2"></i></button>
		</div>
  </form>
</div>
</div>

@endsection
