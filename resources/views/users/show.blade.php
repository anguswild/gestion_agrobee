<div class="modal-body">


  <table class="table table-bordered">
    <tr>
      <td>Nombre de Usuario</td>
      <td>{{$user->username}}</td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td>{{$user->name}}</td>
    </tr>
    <tr>
      <td>Email</td>
      <td>{{$user->email}}</td>
    </tr>
    <tr>
      <td>Rut</td>
      <td>{{$user->rut}}</td>
    </tr>
    <tr>
      <td>Celular</td>
      <td>{{$user->celular}}</td>
    </tr>
    <tr>
      <td>Roles</td>
      <td>
        @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
        <label class="badge badge-primary">{{ $v }}</label>
        @endforeach
        @endif
      </td>
    </tr>
    <tr>
      <td>Estatus</td>
      <td>
        @if($user->isOnline())
        <label class="badge badge-success">Online</label>
        @else
        <label class="badge badge-danger">Offline</label>
        @endif
      </td>
    </tr>


  </table>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Cerrar</button>
</div>