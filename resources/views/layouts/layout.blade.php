<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaFinca</title>

    <link rel="stylesheet" href="{{ asset('estilos2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @livewireStyles
    <script src="https://kit.fontawesome.com/315884b0f2.js" crossorigin="anonymous"></script>
</head>
<body id="body">




            <div class="row row-menu">
                <div class="col-menu col-lg-2 menu-none">

                    <!---AQUI VA LA BARRA LATERAL-->
                    <div class="menu__side" id="menu_side">

                        <div class="name__page tex-center">
                            <i class="fa-regular fa-clipboard" style="visibility:hidden;"></i>
                            <h4>La Finca</h4>
                        </div>

                        <div class="options__menu">

                            @if (Auth::user()->autentificacion->rol == 0)

                            <a href="{{ route('panel_administrativo') }}" class="selected">
                                <div class="option">
                                    <i class="fas fa-home" title="Inicio"></i>
                                    <h4>Panel Administrativo</h4>
                                </div>
                            </a>
                            <a href="{{ route('usuarios') }}">
                                <div class="option">
                                    <i class="fa-solid fa-users"></i>
                                    <h4>Usuarios</h4>
                                </div>
                            </a>
                            <a href="{{ route('clientes') }}">
                                <div class="option">
                                    <i class="fa-solid fa-user"></i>
                                    <h4>Clientes</h4>
                                </div>
                            </a>
                            <a href="{{route ('pedidos')}}">
                                <div class="option">
                                    <i class="fa-solid fa-file-pen"></i>
                                    <h4>Pedidos</h4>
                                </div>
                            </a>
                            {{--<a href="{{route ('ventas')}}">
                                <div class="option">
                                    <i class="fas fa-dollar-sign fa-lg"></i>
                                    <h4>Ventas</h4>
                                </div>
                            </a>--}}
                            <a href="{{ route('productos') }}">
                                <div class="option">
                                    <i class="fa-solid fa-pizza-slice"></i>
                                    <h4>Productos</h4>
                                </div>
                            </a>
                            <a href="{{route('actividades')}}">
                                <div class="option">
                                    <i class="fa-solid fa-list-check"></i>
                                    <h4>Registro de actividades</h4>
                                </div>
                            </a>

                            <a href="{{ route('cuenta') }}">
                                <div class="option">
                                    <i class="fa-solid fa-gear"></i>
                                    <h4>Mi cuenta</h4>
                                </div>
                            </a>
                            <a href="{{ route('logout') }}">
                                <div class="option">
                                    <i class="fas fa-sign-out fa-lg"></i>
                                    <h4>Cerrar sesion</h4>
                                </div>
                            </a>

                            @elseif (Auth::user()->autentificacion->rol == 1)
                            <a href="{{ route('clientes') }}">
                                <div class="option">
                                    <i class="fa-solid fa-user"></i>
                                    <h4>Clientes</h4>
                                </div>
                            </a>
                            <a href="{{route ('pedidos')}}">
                                <div class="option">
                                    <i class="fa-solid fa-file-pen"></i>
                                    <h4>Pedidos</h4>
                                </div>
                            </a>
                            {{--<a href="{{route ('ventas')}}">
                                <div class="option">
                                    <i class="fas fa-dollar-sign fa-lg"></i>
                                    <h4>Ventas</h4>
                                </div>
                            </a>--}}
                            <a href="{{ route('cuenta') }}">
                                <div class="option">
                                    <i class="fa-solid fa-gear"></i>
                                    <h4>Mi cuenta</h4>
                                </div>
                            </a>
                            <a href="{{ route('logout') }}">
                                <div class="option">
                                    <i class="fas fa-sign-out fa-lg"></i>
                                    <h4>Cerrar sesion</h4>
                                </div>
                            </a>
                            @elseif (Auth::user()->autentificacion->rol == 2)
                            <a href="{{route ('pedidos')}}">
                                <div class="option">
                                    <i class="fa-solid fa-file-pen"></i>
                                    <h4>Pedidos</h4>
                                </div>
                            </a>
                            <a href="{{ route('cuenta') }}">
                                <div class="option">
                                    <i class="fa-solid fa-gear"></i>
                                    <h4>Mi cuenta</h4>
                                </div>
                            </a>
                            <a href="{{ route('logout') }}">
                                <div class="option">
                                    <i class="fas fa-sign-out fa-lg"></i>
                                    <h4>Cerrar sesion</h4>
                                </div>
                            </a>

                            @endif


                        </div>

                    </div>

                </div>

                <div class="">
                    <!---AQUI VA LA NAVBAR-->
                    <header>
                        <div class="icon__menu">
                            <i class="fas fa-bars" id="btn_open"></i>
                        </div>


                        <div class="user-wrapper">
                            @if (Auth::user()->autentificacion->rol == 0)
                                <img src="img/administrador.png" width="40px" height="40px" alt="">
                                <div>
                                    <h4>{{Auth::user()->nombre}}</h4>
                                    <small>Admin</small>
                                </div>
                            @elseif (Auth::user()->autentificacion->rol == 1)
                                <img src="img/mesero.png" width="40px" height="40px" alt="">
                                <div>
                                    <h4>{{Auth::user()->nombre}}</h4>
                                    <small>Mesero</small>
                                </div>
                            @elseif (Auth::user()->autentificacion->rol == 2)
                                <img src="img/chef.png" width="40px" height="40px" alt="">
                                <div>
                                    <h4>{{Auth::user()->nombre}}</h4>
                                    <small>Cocinero</small>
                                </div>
                            @endif
                        </div>
                    </header>
                    <main>
                        <br>
                        <br>
                        <div class="container"> <!------ENSEGUIDA SIGUE EL CONTENEDOR EL CUAL ABAJO IMPRIME LA CARTA LLAMANDO AL CONTENT------------>
                            <br>
                            @section('content')

                            @show
                            <br>

                    </main>
                    </div>
                </div>
            </div>

            {{------------------------------------------------------------------}}


            <div class="container">

            </div>

        <br>



    <script src="{{asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    @livewireScripts
</body>
</html>
