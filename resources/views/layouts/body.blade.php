
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Finca</title>
    <link rel="stylesheet" href="{{ asset('navegacion.css') }}">
    <script src="{{ asset('js/loadpage.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>


    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <script src="https://kit.fontawesome.com/373ef2ab6b.js" crossorigin="anonymous"></script>
</head>
  <body>

    <!--<div class="loadPage">
      <p><img src="img/pizza_load.gif" style="width: 170px">
        <br>
        Cargando...
      </p>
    </div>--->
<!---HEADER--->
<!--<div class="container-xl">-->
<header>
    <nav>
        <div>
            <a href="{{asset('/')}}"><img src="img/LogoFincapng.png" alt="" class="logo"></a>
        </div>
        <input type="checkbox" id="check">
        <label for="check" class="bar-btn">
            <i class="fa-solid fa-bars"></i>
        </label>
        <ul class="nav-menu">
            <li><a class="" href="{{asset('/')}}"> <i class="fa-solid fa-house"> Home</i></a></li>
            <li><a href="{{asset('menu')}}"><i class="fa-solid fa-pizza-slice"> Menu</i></a></li>
            <li><a href="tel:3336856049"><i class="fa-solid fa-phone"></i> 3336856049</i></a></li>

        </ul>
    </nav>

</header>
<!--</div>-->
<!------------->

<div class="container-fluid">

    @section('content')

    @show

</div>

<footer class="bg-dark text-center text-lg-start">
    <!-- Grid container -->
    <div class="container p-4">
      <!--Grid row-->
      <div class="row">

          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h3 class="text-uppercase text-center" style="color: #fff;">Contacto</h3>
              <p style="color: #fff;">Libertad 65, 45100 Tesistán, Jal.</p>
              <p  style="color: #fff;">33-3685-6049</p>

            <!--Grid column-->

            <!--Grid column-->

            <!--Grid column-->
          </div>



          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h3 class="text-uppercase text-center" style="color: #fff;">Acerca de  nosotros </h3>
              <p style="color: #fff; font-size:20px;">Somos un restaurante italo-argentino pero con un sazón muy mexicano.
              </p>
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->



      </div>
      <h4 class="text-center" style="color: #fff;">Nuestros horarios de atencion</h4>
              <div class="container text-center">
               <div class="row">
                   <div class="col-sm-6">
                       <ul class="">
                           <div  style="color: #fff;" class="li">Martes</div>
                           <div  style="color: #fff;" class="li">Miercoles</div>
                           <div  style="color: #fff;" class="li">Jueves</div>
                           <div  style="color: #fff;" class="li">Viernes</div>
                           <div  style="color: #fff;" class="li">Sabado</div>
                           <div  style="color: #fff;" class="li">Domingo</div>
                       </ul>
                   </div>
                   <div  style="color: #fff;" class="col-sm-6">
                       <ul  style="color: #fff;" class="">
                           <div  style="color: #fff;" class="li">6:00-11:00</div>
                           <div  style="color: #fff;" class="li">6:00-11:00</div>
                           <div  style="color: #fff;" class="li">6:00-11:00</div>
                           <div  style="color: #fff;" class="li">12:00-12:00</div>
                           <div  style="color: #fff;" class="li">12:00-12:00</div>
                           <div  style="color: #fff;" class="li">12:00-12:00</div>
                       </ul>
                   </div>
               </div>

            </div>

    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); color:#fff;">
      © 2022 Pizzeria La Finca Copyright | Derechos Reservados | Desarrollado por: Andres Unda Armas
      <a class="text-dark" href="https://mdbootstrap.com/"></a>
    </div>
    <!-- Copyright -->
  </footer>


<!------------------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</body>
</html>
