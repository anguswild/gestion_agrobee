<form action="{{route('aplicaciones.update', $aplicacion->id) }}" method="post">
  <div class="modal-body">

    @csrf
    @method('PATCH')
    <div class="form-group row">
        <label class="col-form-label col-lg-2">Nombre de la Empresa:</label>
        <div class="col-lg-10">
          <select class="form-control" name="empresa_id" id="empresa_id" required>
            <option></option>
            @foreach($empresas as $empresa)
            <option value="{{$empresa->id}}" {{ $aplicacion->empresa_id == $empresa->id ? 'selected' : '' }}>{{$empresa->nombre}}</option>
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
            <option value="{{$user->id}}" {{ $aplicacion->user_id == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Fecha de Aplicación:</label>
        <div class="col-lg-10">
        <input class="form-control datepicker" type="text" name="fecha_aplicacion" id="fecha_aplicacion" onfocus="this.blur()" value="@if($aplicacion->fecha_aplicacion != NULL || $aplicacion->fecha_aplicacion != '' ){{Carbon\Carbon::parse($aplicacion->fecha_aplicacion)->format('d/m/Y')}}@endif" placeholder="Ingrese Fecha de Aplicación" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Tipo de maquinaria:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="tipo_maquinaria" id="tipo_maquinaria" maxlength="191" value="{{$aplicacion->tipo_maquinaria}}" placeholder="Ingrese Tipo de maquinaria" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Nombre del producto:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="nombre_producto" id="nombre_producto" maxlength="191" value="{{$aplicacion->nombre_producto}}" placeholder="Ingrese Nombre del producto" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Dosis:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="dosis" id="dosis" maxlength="191" value="{{$aplicacion->dosis}}" placeholder="Ingrese Dosis" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Cantidad de agua aplicada:</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="cantidad_agua" id="cantidad_agua" maxlength="191" value="{{$aplicacion->cantidad_agua}}" placeholder="Ingrese Cantidad de agua aplicada">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-form-label col-lg-2">Cantidad de Hectáreas (HA):</label>
        <div class="col-lg-10">
          <input class="form-control" type="text" name="cantidad_hectareas" id="cantidad_hectareas" maxlength="191" value="{{$aplicacion->cantidad_hectareas}}" placeholder="Ingrese Cantidad de Hectáreas (HA)" required>
        </div>
      </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary">Guardar <i class="icon-paperplane ml-2"></i></button>
</div>
  </form>
  <script>
  $(document).ready(function() {

    $('.datepicker').datepicker({
      language: "es",
      format: 'dd/mm/yyyy'
    });
  });
</script>
