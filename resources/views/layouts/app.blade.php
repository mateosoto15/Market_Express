<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
        @yield('styles_')
        @include('partials.jsfiles')
        @yield('jsfiles_')

    </head>
    <body class="font-sans antialiased  app sidebar-mini">
        @if(Route::getCurrentRoute()->getPrefix() == '/admin')
            @include('partials.sidbar')
        @endif

        {{-- Checking flash messages --}}
        @if(Session::has('message'))
            <div id="session_message" data-message="{{Session::get('message')}}"></div>
        @endif

        @if(Session::has('errorMessage'))
            <div id="session_errorMessage" data-message="{{Session::get('errorMessage')}}"></div>
        @endif

        <div class="min-h-screen bg-gray-100" @if(Route::getCurrentRoute()->getPrefix() == '/admin' ) id="app" @endif>
            
            @if(Route::getCurrentRoute()->getPrefix() == '/admin')
                @include('partials.headerAdmin')
            @endif

            <!-- Page Content -->
            <main class="full-height py-4 @if(Route::getCurrentRoute()->getPrefix() == '/admin') app-content @endif">
                {{-- Encabezado para la seccion administrador --}}
                @if(Route::getCurrentRoute()->getPrefix() == '/admin')
                    <div class="app-title">
                        <div>
                            <h1><i class="fas fa-@yield('font') @yield('font-icon')"></i> @yield('title')</h1>
                            <p>@yield('description')</p>
                        </div>
                        <ul class="app-breadcrumb breadcrumb">
                            <li class="breadcrumb-item"><i class="fas fa-@yield('font') fa-lg  @yield('font-icon')"></i></li>
                            <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                        </ul>
                    </div>
                @endif


                @yield('content')
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
