<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a>
		Navigation
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">
		<!-- Main navigation -->
		<div class="card card-sidebar-mobile">
			<ul class="nav nav-sidebar" data-nav-type="accordion">
				<!-- Main -->
				<li class="nav-item-header">
					<div class="text-uppercase font-size-xs line-height-xs">MENU</div> <i class="icon-menu" title="Main"></i>
				</li>

				<li class="nav-item">
					<a href="{{ route('home') }}" class="nav-link {{Request::is('home') ? 'active' : ''}}">
						<i class="fas fa-home"></i>
						<span>Dashboard</span>
					</a>
				</li>

				@can('empresas-listar')
				<li class="nav-item nav-item-submenu {{Request::is('empresas','empresas/create') ? 'nav-item-open' : ''}}">
					<a href="#" class="nav-link {{Request::is('empresas','empresas/create') ? 'active' : ''}}"><i class="fas fa-address-book"></i> <span>Empresas</span></a>

					<ul class="nav nav-group-sub" style="{{Request::is('empresas','empresas/create') ? 'display: block;' : ''}}" data-submenu-title="Empresas">
						@can('empresas-crear')<li class="nav-item"><a href="{{ route('empresas.create') }}" class="nav-link {{Request::is('empresas/create') ? 'active' : ''}}">Crear Empresa</a></li>@endcan
						<li class="nav-item"><a href="{{ route('empresas.index') }}" class="nav-link {{Request::is('empresas') ? 'active' : ''}}">Listar Empresas</a></li>
					</ul>


				</li>
				@endcan

				@can('abejas-listar')
				<li class="nav-item nav-item-submenu {{Request::is('abejas','abejas/create') ? 'nav-item-open' : ''}}">
					<a href="#" class="nav-link {{Request::is('abejas','abejas/create') ? 'active' : ''}}"><i class="fas fa-bug"></i> <span>Abejas</span></a>


					<ul class="nav nav-group-sub" style="{{Request::is('abejas','abejas/create') ? 'display: block;' : ''}}" data-submenu-title="Abejas">
						@can('abejas-crear')<li class="nav-item"><a href="{{ route('abejas.create') }}" class="nav-link {{Request::is('abejas/create') ? 'active' : ''}}">Crear Abejas</a></li>@endcan
						<li class="nav-item"><a href="{{ route('abejas.index') }}" class="nav-link {{Request::is('abejas') ? 'active' : ''}}">Listar Abejas</a></li>
					</ul>


				</li>
				@endcan

				@can('aplicaciones-listar')
				<li class="nav-item nav-item-submenu {{Request::is('aplicaciones','aplicaciones/create') ? 'nav-item-open' : ''}}">
					<a href="#" class="nav-link {{Request::is('aplicaciones','aplicaciones/create') ? 'active' : ''}}"><i class="fas fa-tint"></i><span>Aplicaciones</span></a>


					<ul class="nav nav-group-sub" style="{{Request::is('aplicaciones','aplicaciones/create') ? 'display: block;' : ''}}" data-submenu-title="Aplicaciones">
						@can('aplicaciones-crear')<li class="nav-item"><a href="{{ route('aplicaciones.create') }}" class="nav-link {{Request::is('aplicaciones/create') ? 'active' : ''}}">Crear Aplicaciones</a></li>@endcan
						<li class="nav-item"><a href="{{ route('aplicaciones.index') }}" class="nav-link {{Request::is('aplicaciones') ? 'active' : ''}}">Listar Aplicaciones</a></li>
					</ul>
				</li>
				@endcan




				@can('usuarios-listar')
				<li class="nav-item nav-item-submenu {{Request::is('users', 'users/create', 'users/recuperar') ? 'nav-item-open' : ''}}">
					<a href="#" class="nav-link {{Request::is('users', 'users/create', 'users/recuperar') ? 'active' : ''}}"><i class="fas fa-users"></i>Usuarios</a>
					<ul class="nav nav-group-sub" style="{{Request::is('users', 'users/create', 'users/recuperar') ? 'display: block;' : ''}}" data-submenu-title="Usuarios">
					@can('usuarios-crear')<li class="nav-item"><a href="{{ route('users.create') }}" class="nav-link {{Request::is('users/create') ? 'active' : ''}}">Crear Usuario</a></li>@endcan
						<li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link {{Request::is('users') ? 'active' : ''}}">Listar Usuarios</a></li>
						@can('usuarios-borrar')<li class="nav-item"><a href="{{ route('users.recuperar') }}" class="nav-link {{Request::is('users/recuperar') ? 'active' : ''}}">Recuperar Usuarios</a></li>@endcan
					</ul>
				</li>
				@endcan

				@can('roles-listar')
				<li class="nav-item nav-item-submenu {{Request::is('roles','roles/create') ? 'nav-item-open' : ''}}">
					<a href="#" class="nav-link {{Request::is('roles','roles/create') ? 'active' : ''}}"><i class="fas fa-cogs"></i>Roles</a>
					<ul class="nav nav-group-sub" style="{{Request::is('roles','roles/create') ? 'display: block;' : ''}}" data-submenu-title="Roles">
					@can('roles-crear')<li class="nav-item"><a href="{{ route('roles.create') }}" class="nav-link {{Request::is('roles/create') ? 'active' : ''}}">Crear Rol</a></li>@endcan
						<li class="nav-item"><a href="{{ route('roles.index') }}" class="nav-link {{Request::is('roles') ? 'active' : ''}}">Listar Roles</a></li>
					</ul>
				</li>
				@endcan



			

				<!-- /main -->

			</ul>
		</div>
		<!-- /main navigation -->

	</div>
	<!-- /sidebar content -->

</div>
<!-- /main sidebar -->