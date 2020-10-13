<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app_profile.css') }}">
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>
        @include('partials.head')
        @yield('styles_')
        @include('partials.jsfiles')
        @yield('jsfiles_')
    </head>
    <body>
        @if(isset($slot))
            {{ $slot }}
        @else
        <section class="header-principal">
            <img width="170px" src="{{ url('/images/logo.jpeg') }}"/>
            <div class="title">
                <h1 class="pt-5">MARKET EXPRESS</h1>
            </div>
            @auth
            <ul class="app-nav pt-3">
                <li class="dropdown">
                    <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i ><img class="app-sidebar__user-avatar responsive-avatar" src="{{\Auth::user()->getProfilePhotoUrlAttribute()}}" onerror="this.src='{{url("/images/small/perfil.png")}}'" width="80" alt="User Image"></i></a>
                    <ul class="dropdown-menu settings-menu dropdown-menu-right">
                        <li>
                            <a class="dropdown-item" href="{{ url('/user/profile') }}" ><i class="fa fa-user fa-lg"></i> Perfil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            @endauth
        </section>
        <div class="principal">
            @guest
                <div class="con text-center">
                    <div class="inline-flex mb-3">
                        <a href="{{ url('/login') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l">
                            Loguearse
                          </a>
                          <a href="{{ url('/register') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r">
                            Registrarse
                        </a>
                    </div>
                    <div class="card" style="max-width: 600px;">
                        <div class="card-body">
                            <p class="text-justify">
                                Somos un buscador que compara las ofertas y precios de productos que nos proporcionan numerosas empresas dedicadas al sector de ventas y comercio. Desde grandes supermercados hasta pequeños mini mercados, las posibilidades son diversas. Comparamos y mostramos las ofertas de varias compañías, de las que recibimos una comisión si un usuario hace clic en una oferta concreta. No formamos parte de ningún acuerdo de compra que haga contigo y con el sitio web. No recaudamos ningún pago  y no somos responsables de los servicios que ofrece directamente el proveedor
                            </p>
                        </div>
                    </div>
                </div>
            @endguest
            @yield('content')
        </div>
        @endif
    </body>
</html>

<style>
body{
    margin:0;
    padding: 0;
    background-image: url({{ url('/images/fondo.jpeg') }});
    background-repeat:no-repeat;
    background-size: cover;
    width: 100%;
    height: 100vh;
}
section{
    background-color:#ff0000c2;
    height: 143px;
    display: flex;
    text-align:center;
}
.title{
    width: 100%;
    font-size:40px;
}
.principal{
    align-items: center;
    height: 100%;
    display: flex;
    justify-content: center;
}
.con{
    align-items: center;
}
@media (max-width: 820px)  {
    body{
        background-image: url({{ url('/images/fondo-res.jpeg') }});
    }
    .title{
        font-size:20px;
    }
}
</style>