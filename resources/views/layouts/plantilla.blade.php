<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <title>Tptech</title>
</head>
<body>
    <header>
        <div class="wrapper-proyect">
            <div class="header-grid">
                <div class="logo">
                    <a href="{{asset ('/') }}">TP-TECH</a>
                </div>
    
                <nav class="nav-pag">
                    <ul>
                @guest
                    
                    @if (Route::has('login'))                        
                        <li>
                            <a href="{{route('login')}}">Ingresar</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))                        
                        <li class="sign-up">
                            <a href="{{route('register')}}">Registrarse</a>
                        </li>
                    @endif
                    
                    
                    @else
                        <li class="fa-solid fa-cart-shopping">
                            <a href="">
                                {{ Auth::user()->name }}
                            </a>

                            <div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    
                                    <input type="submit" value="SALIR">
                                </form>
                            </div>
                        </li>


                        @endguest
                        <li><a href="#"><i class="fa-solid fa-cart-shopping"></i></a></li>
                        <li><input type="text" class="barra-busqueda"></div></li>
                </ul>
                    
                </nav>
            </div>
        </div>
    </header>

    <div> 
        @yield('content')

    </div>
    
    


    <footer>
        <h3>Contacto</h3>
        <ul class="media">
            <li><a href="#"><i class="fa-solid fa-envelope"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-telegram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
        </ul>
    </footer>
    <script src="https://kit.fontawesome.com/53123e5901.js" crossorigin="anonymous"></script>
</body>
</html>