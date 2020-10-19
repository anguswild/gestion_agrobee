<form action="{{route('empresas.destroy', $empresa->id) }}" method="post">
  <div class="modal-body">

    @csrf

    @method('DELETE')
    <p>¿Esta seguro que desea borrar esta empresa?</p>


</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-danger btn-sm">Borrar <i class="fas fa-trash-alt"></i></button>
</div>
  </form>
