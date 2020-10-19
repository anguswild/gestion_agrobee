<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
	<div class="navbar-brand">
		<a href="{{ route('home') }}" class="d-inline-block">
			<img style="padding-left: 60px;" src="{{url('img/agrobee_logo.png')}}" alt="">
		</a>
	</div>

	<div class="d-md-none">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
			<i class="icon-tree5"></i>
		</button>
		<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
			<i class="icon-paragraph-justify3"></i>
		</button>
	</div>

	<div class="collapse navbar-collapse" id="navbar-mobile">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
					<i class="fas fa-bars"></i>
				</a>
			</li>
		</ul>

		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown dropdown-user">
				<a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
					<span>{{ Auth::user()->name }}</span>
				</a>

				<div class="dropdown-menu dropdown-menu-right">
					<a href="{{ url('changePassword') }}" class="dropdown-item"><i class="fas fa-cog"></i> Cambiar Contraseña</a>
					<a href="" onclick="event.preventDefault();
												document.getElementById('logout-form').submit();" class="dropdown-item"><i class="fas fa-power-off"></i> {{ __('Logout') }}</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
		</ul>
	</div>
</div>
<!-- /main navbar -->