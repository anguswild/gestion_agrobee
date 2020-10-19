@extends('layouts.app')

@section('pageTitle', 'Roles')
@section('icon')
<i class="fas fa-users"></i>
@endsection


@section('content')

<div class="card">
  <div class="card-header header-elements-inline">
    <h5 class="card-title">Crear Rol</h5>
    <div class="header-elements">
      <div class="list-icons">
        <a class="list-icons-item" data-action="collapse"></a>
      </div>
    </div>
  </div>

  <div class="card-body">
  <form action="{{route('roles.store') }}" method="post">
    @csrf

    <div class="form-group row">
  		<label class="col-form-label col-lg-2">Nombre:</label>
  		<div class="col-lg-10">
  			<input class="form-control" type="text" name="name" id="name" placeholder="Ingrese nombre">
  		</div>
  	</div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Permisos:</label>
      <div class="col-lg-10">
        <select class="form-control" name="permission[]" id="permission" multiple="multiple">
          @foreach($permission as $value)
              <option value="{{$value->id}}">{{$value->name}}</option>
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
