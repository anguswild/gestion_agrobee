@extends('layouts.app')

@section('pageTitle', 'Aplicaciones')
@section('icon')
<i class="fas fa-tint"></i>
@endsection

@section('content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Crear Aplicación</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>

  <div class="card-body">

    <form action="{{route('aplicaciones.store') }}" method="post">
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
        <label class="col-form-label col-lg-2">Fecha de Aplicación:</label>
        <div class="col-lg-10">
        <input class="form-control datepicker" type="text" name="fecha_aplicacion" id="fecha_aplicacion" onfocus="this.blur()" value="{{ old('fecha_aplicacion') }}" placeholder="Ingrese Fecha de Aplicación" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Tipo de maquinaria:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="tipo_maquinaria" id="tipo_maquinaria" maxlength="191" value="{{ old('tipo_maquinaria') }}" placeholder="Ingrese Tipo de maquinaria" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Nombre del producto:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="nombre_producto" id="nombre_producto" maxlength="191" value="{{ old('nombre_producto') }}" placeholder="Ingrese Nombre del producto" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Dosis:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="dosis" id="dosis" maxlength="191" value="{{ old('dosis') }}" placeholder="Ingrese Dosis" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Cantidad de agua aplicada:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="cantidad_agua" id="cantidad_agua" maxlength="191" value="{{ old('cantidad_agua') }}" placeholder="Ingrese Cantidad de agua aplicada">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Cantidad de Hectáreas (HA):</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="cantidad_hectareas" id="cantidad_hectareas" maxlength="191" value="{{ old('cantidad_hectareas') }}" placeholder="Ingrese Cantidad de Hectáreas (HA)" required>
        </div>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Guardar <i class="icon-paperplane ml-2"></i></button>
      </div>
    </form>
  </div>
</div>

@endsection