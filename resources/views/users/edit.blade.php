<form action="{{route('users.update', $user->id) }}" method="post">
  <div class="modal-body">

    @csrf

    @method('PATCH')

    <div class="form-group row">
      <label class="col-form-label col-lg-2">Nombre:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" placeholder="Ingrese nombre" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Email:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="email" id="email" value="{{$user->email}}" placeholder="Ingrese Email" required>
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Rut:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="rut" id="rut" value="{{$user->rut}}" placeholder="Ingrese Rut">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Celular:</label>
      <div class="col-lg-10">
        <input class="form-control" type="text" name="celular" id="celular" value="{{$user->celular}}"  placeholder="Ingrese Celular">
      </div>
    </div>
    <div class="form-group row">
      <label class="col-form-label col-lg-2">Roles:</label>
      <div class="col-lg-10">
        <select class="form-control" name="roles[]" id="roles" multiple="multiple">
          @foreach($roles as $rol)
          <option value="{{$rol->name}}" @foreach($userRole as $usrol) @if($usrol==$rol->name) selected @endif @endforeach>{{$rol->name}}</option>
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
<script>
  $(document).ready(function() {
    $('#roles').select2({
      theme: "classic"
    });
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy'
    });


  });
</script>