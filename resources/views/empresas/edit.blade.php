<form action="{{route('empresas.update', $empresa->id) }}" method="post">
  <div class="modal-body">

    @csrf
    @method('PATCH')
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Nombre:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="nombre" id="nombre" value="{{$empresa->nombre}}" placeholder="Ingrese Nombre">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Rut:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="rut" id="rut" value="{{$empresa->rut}}" placeholder="Ingrese Rut">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Dirección:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="direccion" id="direccion" value="{{$empresa->direccion}}" placeholder="Ingrese Dirección">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Giro:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="giro" id="giro" value="{{$empresa->giro}}" placeholder="Ingrese Giro">
      </div>
    </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary">Guardar <i class="icon-paperplane ml-2"></i></button>
</div>
  </form>
