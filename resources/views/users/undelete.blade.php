<form action="{{route('users.restore', $user->id) }}" method="post">
  <div class="modal-body">

    @csrf

    @method('GET')

    <p>¿Esta seguro que desea recuperar este usuario?</p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-danger btn-sm">Recuperar <i class="fas fa-trash-restore"></i></button>
  </div>
</form>
