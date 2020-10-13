<header class="app-header"><a class="app-header__logo" href="{{url('/')}}">{{ env('APP_NAME') }}</a>
  <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  <nav class="app-nav">
	  <ul class="" style="list-style: none;">
		<li class="">
		  <p class="app-header__logo2"> {{env('DOMAIN_NAME')}} </p>
		</li>
	  </ul>
  </nav>
  <ul class="app-nav" >
	<!--Notification Menu-->
	{{--
	<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i data-count="{{$unread}}" class="fa fa-bell fa-lg notification-icon"></i></a>
	  <ul class="app-notification dropdown-menu dropdown-menu-right">
		<li class="app-notification__title">Tienes {{$unread}} notificaciones nuevas.</li>

		<div class="app-notification__content">
		  @foreach(Auth::user()->unreadNotifications()->take(5)->get() as $notification)
		  @if ($notification->data['type'] === 'task_check')
			<div style="display: none;" id="task_check_notification">{{ $notification->data['data']['name'] }}</div>
		  @endif
		  <li><a class="app-notification__item" href="{{url('/notifications/'.$notification->id)}}"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
			  <div>
				<p class="app-notification__message">{{$notification->data['name']}}</p>
				<p class="app-notification__meta">{{$notification->created_at->diffForHumans()}}</p>
			  </div></a>
		  </li>
		  @endforeach
		  </div>
		</div>
		<li class="app-notification__footer"><a href="{{url('/notifications')}}">Ver todas las notificaciones.</a></li>
	  </ul>
	</li>
	--}}
	<!-- User Menu-->
	<li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
	  <ul class="dropdown-menu settings-menu dropdown-menu-right">
		<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			{{ csrf_field() }}
		</form></li>
	  </ul>
	</li>
  </ul>
</header>