<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MySite.com</title>

    <!-- CK Editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <style>


        .cards {
            margin: 0 auto;
            max-width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(225px, 1fr));
            grid-auto-rows: auto;
            gap: 20px;
            font-family: sans-serif;
            padding-top: 0px;
            width: 90%;

        }

        .bg-card {
            background-color: #FFFFFF;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.4);
        }

        .cart-font {
            font-size: 20px;
        }

        .img {
            width: 100%;
        }

        .center {
            text-align: center;
        }

        /*----------------  Modal Styles ------------- */
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 50px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        
    </style>

</head>

<body style="background-color: #f2f2f2">
    <div>
        <nav class="navbar navbar-expand-md navbar-light shadow-sm " style="background-color:darkblue; ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: #FFFFFF">
                    MySite.com
                </a>

                <button class="navbar-toggler btn" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}" >
                    <i class="bi bi-list" style="color: #FFFFFF; font-size:30px"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a href="{{ route('cart.list') }}"  class="text-black btn btn-warning  nav-link" id="myBtn" style="color: #FFFFFF">
                               Cart <i  class="bi bi-cart-fill"></i>
                                <b>{{ Cart::getTotalQuantity() }}</b>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/store" class="btn nav-link" style="color: #FFFFFF">
                                Tienda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/home" class="btn nav-link" style="color: #FFFFFF">
                                Mi Perfil
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: #FFFFFF">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: #FFFFFF">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a style="color: #FFFFFF" id="navbarDropdown" class="nav-link dropdown-toggle" href="/home" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                </a>

                                <div style="background-color: darkblue" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a style="color: #FFFFFF; background-color:darkblue" class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
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

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    

    <footer style="background-color:darkslategray;">
        <br><br>
        <div class="container cards">
            <div>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
            </div>
            <div>

                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>

            </div>
            <div>

                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>

            </div>
            <div>

                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>
                <a href="" style="color: #f2f2f2">Hola Mundo</a><br>

            </div>
        </div>
        <br><br>
    </footer>

    <script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>

</body>



</html>
