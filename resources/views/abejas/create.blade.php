@extends('layouts.app')

@section('pageTitle', 'Abejas')
@section('icon')
<i class="fas fa-bug"></i>
@endsection

@section('content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Crear Abejas</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>

  <div class="card-body">

    <form action="{{route('abejas.store') }}" method="post">
      @csrf

      <div class="form-group row">
        <label class="col-form-label col-lg-2">Empresa:</label>
        <div class="col-lg-10">
          <select class="form-control" name="empresa_id" id="empresa_id" required>
            <option></option>
            @foreach($empresas as $empresa)
            <option value="{{$empresa->id}}" {{ old('empresa_id') == $empresa->id ? 'selected' : '' }}>{{$empresa->nombre}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Tipo de Contrato:</label>
        <div class="col-lg-10">
        <select class="form-control" name="tipo_contrato" id="tipo_contrato" required>
            <option></option>
            <option value="Arriendo" {{ old('tipo_contrato') == 'Arriendo' ? 'selected' : '' }}>Arriendo</option>
            <option value="Venta" {{ old('tipo_contrato') == 'Venta' ? 'selected' : '' }}>Venta</option>
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Encargado de campo:</label>
        <div class="col-lg-10">
        <select class="form-control" name="user_id" id="user_id" required>
            <option></option>
            @foreach($users as $user)
            <option value="{{$user->id}}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Fecha de postura:</label>
        <div class="col-lg-10">
        <input class="form-control datepicker" type="text" name="fecha_postura" id="fecha_postura" onfocus="this.blur()" value="{{ old('fecha_postura') }}" placeholder="Ingrese Fecha de postura" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Sector de Polinización:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="sector_polinizacion" id="sector_polinizacion" maxlength="191" value="{{ old('sector_polinizacion') }}" placeholder="Ingrese Sector de Polinización" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Tipo de colmena:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="tipo_colmena" id="tipo_colmena" maxlength="191" value="{{ old('tipo_colmena') }}" placeholder="Ingrese Tipo de colmena" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Cantidad de colmenas:</label>
        <div class="col-lg-10">
          <input class="form-control" type="number" min="1" step="1" name="cantidad_colmenas" id="cantidad_colmenas" value="{{ old('cantidad_colmenas') }}" placeholder="Ingrese Cantidad de colmenas" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Cultivo:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="cultivo" id="cultivo" maxlength="191" value="{{ old('cultivo') }}" placeholder="Ingrese Cultivo" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Observaciones:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="observaciones" id="observaciones" maxlength="191" value="{{ old('observaciones') }}" placeholder="Ingrese Observaciones">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Responsable de entrega:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="responsable_entrega" id="responsable_entrega" maxlength="191" value="{{ old('responsable_entrega') }}" placeholder="Ingrese Responsable de entrega" required>
        </div>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Guardar <i class="icon-paperplane ml-2"></i></button>
      </div>
    </form>
  </div>
</div>

@endsection