@extends('layouts.app')

@section('pageTitle', 'Usuarios')
@section('icon')
<i class="fas fa-users"></i>
@endsection

@section('content')
<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Crear Usuario</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>
  <div class="card-body">

    <form action="{{route('users.store') }}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Usuario:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Ingrese usuario" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Nombre:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Ingrese nombre" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Email:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Ingrese Email" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Rut:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="rut" id="rut" value="{{ old('rut') }}" placeholder="Ingrese Rut">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Celular:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="celular" id="celular" value="{{ old('celular') }}" placeholder="Ingrese Celular" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Contraseña:</label>
        <div class="col-lg-10">
          <input class="form-control" type="password" name="password" id="password" placeholder="Ingrese Contraseña" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Confirme Contraseña:</label>
        <div class="col-lg-10">
          <input class="form-control" type="password" name="confirm-password" id="confirm-password" placeholder="Confirme Contraseña" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Roles:</label>
        <div class="col-lg-10">
          <select class="form-control" name="roles[]" id="roles" multiple="multiple" required>
            @foreach($roles as $rol)
            <option value="{{$rol->name}}" {{ old('roles') == $rol->name ? 'selected' : '' }}>{{$rol->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Guardar <i class="icon-paperplane ml-2"></i></button>
      </div>
    </form>
  </div>
</div>

@endsection