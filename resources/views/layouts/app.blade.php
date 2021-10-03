<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

     <!-- Scripts -->
   <script src="{{ asset('js/popper.min.js') }}" defer></script>
   <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
   <script src="{{ asset('js/jquery.min.js') }}"></script>
   <script src="http://code.jquery.com/jquery-latest.js"></script>



   <!-- Fonts -->
   <script defer src="{{ asset('fonts/solid.js') }}"></script>
   <script defer src="{{ asset('fonts/fontawesome.js') }}"></script>
   <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        <li class="nav-item dropdown">
                            <a id="po_data" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Purchase Order
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="po_data">
                                <a class="dropdown-item" href="{{ route('add_po') }}">
                                    {{ __('Add Purchase Order') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('view_po') }}">
                                    {{ __('View Purchase Order') }}
                                </a>
                            </div>
                        </li>

                        @if (Auth::user()->permission == "Admin")

                        <li class="nav-item dropdown">
                            <a id="insert_data" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Insert
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="insert_data">
                                <a class="dropdown-item" href="{{ route('add_zone') }}">
                                    {{ __('Add Zone') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('add_region') }}">
                                    {{ __('Add Region') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('add_territory') }}">
                                    {{ __('Add Territory') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('add_product') }}">
                                    {{ __('Product Registration') }}
                                </a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('User Registration') }}</a>
                        </li>

                        @endif



                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="nav_user" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav_user">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script>
        $(document).ready( function () {
            $('#po_view_tbl').DataTable();
        } );
    </script>


</body>
<link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
</html>
