  <form action="{{route('roles.update', $role->id) }}" method="post">
    <div class="modal-body">

    @csrf

    @method('PATCH')

    <div class="form-group row">
      <label class="col-form-label col-lg-2">Nombre:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="name" id="name" value="{{$role->name}}" placeholder="Ingrese nombre">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Permisos:</label>
      <div class="col-lg-10">
        <select class="form-control" name="permission[]" id="permission" multiple="multiple">
          @foreach($permission as $value)
              <option value="{{$value->id}}" @foreach($rolePermissions as $rol) @if($rol == $value->id) selected @endif @endforeach>{{$value->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar <i class="icon-paperplane ml-2"></i></button>
  </div>
  </form>
</div>
</div>
<script>
  $(document).ready(function() {
    $('#permission').select2({
      theme: "classic"
    });
  });
</script>
