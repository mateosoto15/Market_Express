<aside class="app-sidebar" id="app-sidebar">
	<div class="app-sidebar__user"><img class="app-sidebar__user-avatar responsive-avatar" src="{{\Auth::user()->getProfilePhotoUrlAttribute()}}" onerror="this.src='{{url("/images/small/perfil.png")}}'" width="80" alt="User Image">
		<div>
			<p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
			<p class="app-sidebar__user-designation">{{Auth::user()->role->name}}</p>
		</div>
	</div>
	<ul class="app-menu">


		<!-- ************************************** Dashboard *******************************************************************-->

		@can('view', App\Models\User::class)

		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'dashboard' ? 'active' : ''}}" href="{{url('/admin/dashboard')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
		</li>

		@endcan



		{{-- ************************************************************************************************************************** --}}

		{{-- **************************************************USERS************************************************************* --}}
		@can('create', App\Models\User::class)

		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'users' ? 'active' : ''}}" href="{{url('/admin/users')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Usuarios</span></a>
		</li>

		@endcan
		{{-- ************************************************************************************************************************** --}}

		{{-- *****************************************************PROFILE**************************************************************** --}}

		@if(\Auth::check())

		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'profiles' ? 'active' : ''}}" href="{{url('/user/profile')}}"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Perfil</span></a>
		</li>

		@endif
		{{-- ************************************************************************************************************************** --}}


		{{-- *****************************************************PERMISSONS************************************************************* --}}

		@can('create', App\Models\Permission::class)

		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'permissions' ? 'active' : ''}}" href="{{url('/admin/permissions')}}"><i class="app-menu__icon fa fa-lock"></i><span class="app-menu__label">Permisos</span></a>
		</li>

		@endcan
		{{-- ************************************************************************************************************************** --}}
		{{-- ************************************************************************************************************************** --}}

		{{-- ***************************************************** PRODUCT ************************************************************* --}}
		@can('view', App\Models\Product::class)

		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'products' ? 'active' : ''}}" href="{{url('/admin/products')}}"><i class="app-menu__icon fas fa-boxes"></i><span class="app-menu__label">Productos</span></a>
		</li>

		@endcan
		{{-- ************************************************************************************************************************** --}}

		{{-- ***************************************************** Market ************************************************************* --}}
		@can('view', App\Models\Market::class)

		<li>
			<a class="app-menu__item {{Route::getCurrentRoute()->getName() == 'markets' ? 'active' : ''}}" href="{{url('/admin/markets')}}"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Mercados</span></a>
		</li>

		@endcan
		{{-- ************************************************************************************************************************** --}}

		
		

		
	</ul>
</aside>