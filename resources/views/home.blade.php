@extends('layouts.app')

@section('pageTitle', 'Dashboard')
@section('icon')
<i class="fas fa-home"></i>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">


    <div class="card">
      <div class="card-header header-elements-inline">
        <h5 class="card-title">Listado de Usuarios</h5>
        <div class="header-elements">
          <div class="list-icons">
            <a class="list-icons-item" data-action="collapse"></a>
          </div>
        </div>
      </div>
      <div class="card-body text-center">
        <hr>
        <div class="col">
          <ul class="media-list media-list-linked">
            @foreach ($data as $key => $user)
            <li>
              <a href="#" class="media" data-toggle="collapse" data-target="#{{$user->username}}">

                <div class="media-body">
                  <div class="media-title font-weight-semibold">{{ $user->name }}</div>
                </div>
                <div class="align-self-center ml-3">
                  @if($user->isOnline())
                  <label class="badge badge-success">Online</label>
                  @else
                  <label class="badge badge-danger">Offline</label>
                  @endif
                </div>
              </a>

              <div class="collapse" id="{{$user->username}}">
                <div class="card-body bg-light border-top border-bottom">
                  <ul class="list list-unstyled mb-0">
                    <li><i class="fas fa-user mr-2"></i>{{ $user->username }}</li>
                    <li><i class="fas fa-user-tie mr-2"></i>
                      @if(!empty($user->getRoleNames()))
                      @foreach($user->getRoleNames() as $v)
                      <label class="badge badge-primary">{{ $v }}</label>
                      @endforeach
                      @endif
                    </li>
                    <li><i class="fas fa-envelope mr-2"></i> <a href="mailto:{{$user->email}}">{{ $user->email }}</a></li>
                    <li><i class="fas fa-phone-square-alt mr-2"></i>{{ $user->celular }}</li>
                  </ul>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>



      </div>
    </div>

  </div>



</div>
@endsection
