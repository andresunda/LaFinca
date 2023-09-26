
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>La Finca</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="estilosCarta.css">
    <script src="{{ asset('js/loadpage.js') }}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>



    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>

    <script src="https://kit.fontawesome.com/373ef2ab6b.js" crossorigin="anonymous"></script>
</head>
  <body>

    <!--<div id="preloader">
        <br>
      <p>Cargando...</p>
    </div>
-->

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
            <li><a class="active" href="{{asset('/')}}"><i class="fa-solid fa-house"> Home</i></a></li>
            <li><a href="{{asset('menu')}}"><i class="fa-solid fa-pizza-slice"> Menu</i></a></li>
            <li><a href="tel:3310622967"><i class="fa-solid fa-phone"></i> 3336856049</i></a></li>

        </ul>
    </nav>
    <div class="banner-text">
        <h2 style="font-size:50px">La Finca</h2>
        <h1>Pizzas a la<span style="100px;"> leña</span></h1>
    <br>
    <a href="" class="button1">Nuestro Menu</a>
    <a href="tel:3336856049" class="button2">¡Llamanos!</a>
    </div>
</header>
<!--</div>-->
<!------------->
<section class="">
<div class="container-fluid"style="background: rgb(255,209,0); background: linear-gradient(90deg, rgba(255,209,0,1) 18%, rgba(252,164,22,1) 65%, rgba(255,149,0,1) 100%);">
  <br>

  <p style="font-family:Pacifico; font-size:80px; font-style:italic; color:white; text-align:center;">Las mas vendidas</p>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col" >
      <div class="cartaMenu">
        <div class="face front">
        <img src="img/Bluedemon.jpg"  style="" alt="">
        <h3>Blue Demon</h3>
        </div>
        <div class="face back">
        <h3>Blue Demon</h3>
        <p style="font-size:20px;">Deliciosa pizza con salsa de tomate hecha en casa
            con base de queso mozarella con tocino, queso azul y
            un toque de miel.
        </p>

        </div>
        </div>
    </div>

    <div class="col">
      <div class="cartaMenu">
        <div class="face front">
        <img src="img/Sara.jpeg" style="width: " alt="">
        <h3>Sara Garcia</h3>
        </div>
        <div class="face back">
        <h3>Sara Garcia</h3>
        <p style="font-size:20px;">Deliciosa pizza con salsa de tomate hecha en casa
            con base de queso mozarella con arrachera y tu escoges
        tus otros 2 ingredientes.</p>

        </div>
        </div>
    </div>

    <div class="col">
      <div class="cartaMenu">
        <div class="face front">
        <img src="img/Capulina.jpeg" style="width: " alt="">
        <h3>Capulina</h3>
        </div>
        <div class="face back">
        <h3>Capulina</h3>
        <p style="font-size:20px;">Deliciosa pizza con salsa de tomate hecha en casa
            con base de queso mozarella y 3 carnes frias como son
            peperoni, jamon y salami frescos.
        </p>

        </div>
        </div>
    </div>

  </div>
      <br>
      <br>
      <br>
      <br>

</div>

</section>

<!--
<div class="container-fluid text-center" style="background-image: linear-gradient(to right top, #c6c6c6, #cfcfcf, #d8d8d8, #e2e2e2, #ebebeb);">
  <div class="row">

    <div class="col-sm-8" style=" padding-top:30px">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3729.776523859974!2d-103.47935968459998!3d20.80032700091222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428a6f48a740e4d%3A0x19e5faa3b7ac5762!2sLa%20Finca!5e0!3m2!1ses!2smx!4v1664430048263!5m2!1ses!2smx"
      width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="col-sm-4">
      <p style="font-family:Pacifico; font-size:80px; padding-top: 30%;">¿Dondé estamos</p>
      <p style="font-family:Pacifico; font-size:80px; ">ubicados?</p>

    </div>

  </div>
  <br>
</div>
-->


<div class="container text-center">
  <div class="row">
    <div class="col-sm-4"> <p style="font-family:Pacifico; font-size:80px; font-style:italic; color:rgb(0, 0, 0); text-align:center; padding-top:10%">Pidenos por:</p>
    </div>
    <div class="col-sm-8">
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col">
          <a href="https://www.rappi.com.mx/restaurantes/1923740415-la-finca-tesistan" target="_blank">
              <img src="img/rappi.png" alt="..." style="width: 150px; padding-top:90px;">
        </a>
          </div>

        <div class="col">
            <a href="https://www.ubereats.com/mx/store/la-finca/LJxJftZcR2ucPizZY5dX9Q" target="_blank">
            <img src="img/uber.png" alt="..."  style="width: 250px; padding-top:50px;">
            </a>
        </div>

     <div class="col">
        <a href="https://www.didi-food.com/es-MX/food/store/5764607692749144144/LA-FINCA/" target="_blank">
            <img src="img/didi.png" alt="..."  style="width: 250px; ">
        </div>
    </a>
      </div>

    </div>
  </div>
</div>

<br>

<!--CONTENEDOR DE API GOOGLE Y DATOS DEL LUGAR-->
<div class="container text-center">
    <div class="row">
        <div class="col-sm-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3729.776523859875!2d-103.47935968640395!3d20.80032700091624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428a6f48a740e4d%3A0x19e5faa3b7ac5762!2sLa%20Finca!5e0!3m2!1ses!2smx!4v1664902554701!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-sm-4">
            <p style="font-family:Pacifico; font-size:60px; font-style:italic; color:rgb(0, 0, 0); text-align:center; padding-top:5%">
                Contacto</p>
       <p>Estamos ubicados en Calle Libertad 65, 45100 Tesistán, Jal.</p>
       <p>A 2 cuadras de la plaza de tesistan</p>
       <p>Haz tu pedido al: 3310622967</p>
       <h4>Nuestros horarios de atencion</h4>
       <div class="container text-center">
        <div class="row">
            <div class="col-sm-6">
                <ul class="">
                    <div class="li">Martes</div>
                    <div class="li">Miercoles</div>
                    <div class="li">Jueves</div>
                    <div class="li">Viernes</div>
                    <div class="li">Sabado</div>
                    <div class="li">Domingo</div>
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="">
                    <div class="li">6:00-11:00</div>
                    <div class="li">6:00-11:00</div>
                    <div class="li">6:00-11:00</div>
                    <div class="li">12:00-12:00</div>
                    <div class="li">12:00-12:00</div>
                    <div class="li">12:00-12:00</div>
                </ul>
            </div>
        </div>
       </div>
       <p></p>
        </div>
    </div>
</div>
<br>

<footer class="bg-dark text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">

        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <h3 class="text-uppercase text-center" style="color: #fff;">Contacto</h3>
            <p style="color: #fff; font-size:20px;">Libertad 65, 45100 Tesistán, Jal.</p>
            <p  style="color: #fff; font-size:20px;">33-3685-6049</p>

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

      <h1 class="text-center" style="color: #fff;">Nuestros horarios de atencion</h1>
              <div class="container text-center">
               <div class="row">
                   <div class="col-sm-6">
                       <ul class="">
                           <div  style="color: #fff; font-size:20px;" class="li">Martes</div>
                           <div  style="color: #fff; font-size:20px;" class="li">Miercoles</div>
                           <div  style="color: #fff; font-size:20px;" class="li">Jueves</div>
                           <div  style="color: #fff; font-size:20px;" class="li">Viernes</div>
                           <div  style="color: #fff; font-size:20px;" class="li">Sabado</div>
                           <div  style="color: #fff; font-size:20px;" class="li">Domingo</div>
                       </ul>
                   </div>
                   <div  style="color: #fff;" class="col-sm-6">
                       <ul  style="color: #fff;" class="">
                           <div  style="color: #fff; font-size:20px;" class="li">6:00-11:00</div>
                           <div  style="color: #fff; font-size:20px;" class="li">6:00-11:00</div>
                           <div  style="color: #fff; font-size:20px;" class="li">6:00-11:00</div>
                           <div  style="color: #fff; font-size:20px;" class="li">12:00-12:00</div>
                           <div  style="color: #fff; font-size:20px;" class="li">12:00-12:00</div>
                           <div  style="color: #fff; font-size:20px;" class="li">12:00-12:00</div>
                       </ul>
                   </div>
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
<!--CAROUSEL DE IMAGENES-->

<!------------------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>
</html>
