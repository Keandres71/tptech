<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app2.css') }}" >
    <title>TpTech</title>
</head>
<body>
    <header>
        <div class="wrapper-proyect">
            <div class="header__nav grid">

                <div class="header__logo">
                    <a href="{{asset ('/') }}">TPTECH</a>
                </div>

                <div class="header__busqueda grid">
                    <input type="text">
                    <div class="header__lupa">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>

                <ul class="header__icons grid header__menu_horizontal">
                    <li><a href="{{ route('ver.carrito') }}"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li class="relative">
                        <a href=""><i class="fa-solid fa-user"></i></a>
                        <ul class="header__menu_vertical_user">
                        @guest

                            @if (Route::has('login'))
                                <li>
                                    <a href="{{route('login')}}">Login</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="sign-up">
                                    <a href="{{route('register')}}">Register</a>
                                </li>
                            @endif

                            @else
                                <li class="sign-up">
                                    <a href="">
                                        {{ Auth::user()->name }}
                                    </a>

                                </li>

                                <li class="sign-up">
                                    <a href="{{route('NewProfile')}}">
                                        Editar Perfil
                                    </a>

                                </li>
                                @can('admin.home')
                                    
                                <li class="sign-up">
                                    <a href="{{ route('admin.home') }}">
                                        AdminTPT
                                    </a>
                                </li>
                                @endcan
                                
                                <li>

                                    <div>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf

                                            <input type="submit" value="Salir" class="user-salir">
                                        </form>
                                    </div>
                                </li>


                        @endguest
                </ul>

                </nav>
            </div>
        </div>
    </header>

    <div>
        @yield('content')

    </div>
    <footer>
        <div class="wrapper-proyect grid footer">
            <ul class="footer__politicas">
                <li><a href="">Termios y condiciones</a></li>
                <li><a href="">Politica de envios</a></li>
                <li><a href="">Politica de privacidad</a></li>
            </ul>

            <p class="footer__copy">Copyright &copy; 2022 todos los derechos reservados</p>

            <ul class="footer__redes grid">
                <li><a href=""><i class="fa-brands fa-facebook-square"></i></a></li>
                <li><a href=""></a><i class="fa-brands fa-instagram-square"></i></li>
                <li><a href=""></a><i class="fa-brands fa-whatsapp-square"></i></li>
                <li><a href=""><i class="fa-brands fa-twitter-square"></i></a></li>
            </ul>
        </div>
    </footer>
    @yield('js')
    <script src="https://kit.fontawesome.com/53123e5901.js" crossorigin="anonymous"></script>
</body>
</html>