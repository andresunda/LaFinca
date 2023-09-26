@extends('layouts.body')
@section('content')
<div>

  <br>

<h2 style="font-family:Pacifico; font-size:80px; font-style:italic; color:rgb(255, 255, 255); text-align:center;">Pizzas
</h2>
<br>

    <div class="row row-cols-1 row-cols-md-3 g-4 ">
      @foreach ($pizzas as $pizza)
        <div class="col d-block mx-auto">
            <div class="card mb-3 text-bg-dark mb-3 d-block mx-auto h-100" style="width: 22rem;">
                <div class="row gy-3">
                        <img class="card-img-top" src="{{asset('storage/'.$pizza->img)}}" alt="Card image cap" style="width:457px; height:260px;">
                        <div class="card-body">
                            <h3 class="card-title" style="font-family:Pacifico; font-style:italic; color:rgb(255, 255, 255); text-align:center;" >{{$pizza->nombre_producto}}</h3>
                            <h5 class="card-text">{{$pizza->descripcion}}</h5>
                            <h3 style="font-family:Pacifico; font-style:italic; color:rgb(255, 255, 255); text-align:center;">Precios
                          </h3>
                          <div class="container text-center">
                            <div class="row">
                              <div class="col" style="font-size: 20px;">
                                Chica
                              </div>
                              <div class="col" style="font-size: 20px;">
                                Grande
                              </div>
                            </div>
                        </div>
                        <div class="container text-center">
                            <div class="row">
                              <div class="col">
                                <p style="font-size: 20px;">${{$pizza->precio_chica}}</p>
                              </div>
                              <div class="col">
                                <p style="font-size: 20px; ">${{$pizza->precio_grande}}</p>

                              </div>
                            </div>
                        </div>
                        </div>

                </div>
              </div>
        </div>
        @endforeach
      </div>


    <br>

<h2 style="font-family:Pacifico; font-size:80px; font-style:italic; color:rgb(255, 255, 255);; text-align:center;">Pepitos
</h2>
<br>
@foreach($pepitos as $pepito)
<div class="col d-block mx-auto">
  <div class="card mb-3 text-bg-dark mb-3 d-block mx-auto h-100" style="width: 24rem;">
      <div class="row gy-3">
              <img class="card-img-top" src="{{asset('storage/'.$pepito->img)}}" alt="Card image cap" style="width:457px; height:260px;" >
              <div class="card-body">
                  <h3 class="card-title" style="font-family:Pacifico; font-style:italic; color:rgb(255, 255, 255); text-align:center;" >{{$pepito->nombre_producto}}</h3>
                  <p class="card-text">{{$pepito->descripcion}}</p>
                  <h3 style="font-family:Pacifico; font-style:italic; color:rgb(255, 255, 255); text-align:center;">Precio
                </h3>
              <div class="container text-center">
                  <div class="row">
                    <div class="col">
                      <p style="font-size: 25px;" >${{$pepito->precio}}</p>
                    </div>
                  </div>
              </div>
              </div>
      </div>
    </div>
</div>
@endforeach


<br>


        <br>
        <h2 style="font-family:Pacifico; font-size:80px; font-style:italic; color:rgb(255, 255, 255);; text-align:center;">Pa botanear</h2>
        <br>
        <div class="row row-cols-1 row-cols-md-2 g-3">
            @foreach ($otros as $otro)
                    <div class="col d-block mx-auto">
                        <div class="card mb-3 text-bg-dark mb-3 d-block mx-auto h-100" style="width: 24rem;">
                            <div class="row gy-3">
                                    <img class="card-img-top" src="{{asset('storage/'.$otro->img)}}" alt="Card image cap" style="width:457px; height:260px;" >
                                    <div class="card-body">
                                        <h3 class="card-title" style="font-family:Pacifico; font-style:italic; color:rgb(255, 255, 255); text-align:center;" >{{$otro->nombre_producto}}</h3>
                                        <p class="card-text">{{$otro->descripcion}}</p>
                                        <h3 style="font-family:Pacifico; font-style:italic; color:rgb(255, 255, 255); text-align:center;">Precio
                                      </h3>
                                    <div class="container text-center">
                                        <div class="row">
                                          <div class="col">
                                            <p style="font-size: 25px;" >${{$otro->precio}}</p>
                                          </div>
                                        </div>
                                    </div>
                                    </div>
                            </div>
                          </div>
                    </div>
                    @endforeach
                  </div>

        <br>

        <h2 style="font-family:Pacifico; font-size:60px; font-style:italic; color:rgb(255, 255, 255); text-align:center;">Ingredientes de la casa
        </h2>
        <br>

        <div class="row row-cols-1 row-cols-md-1 g-2">
            <div class="col ">
                <div class="card mb-3 text-bg-dark d-block mx-auto" style="width: 80%; ">
                    <div class="row g-0">
                      <div class="col-md-6">
                        <img src="https://media.istockphoto.com/photos/ham-salami-and-sausages-mix-picture-id1124545171?k=20&m=1124545171&s=612x612&w=0&h=fGSaY9QY-1Qq9ZHssE69Ya9dsTrmdfw4vAAaPsSSoXk=" class="img-fluid rounded-start" alt="..." style="height:100% ">
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <h3 class="card-title text-center" style="font-family:Pacifico; font-style:italic;">Carnes</h3>
                          <ul class="">
                            <li style="list-style: disc;"><p>Peperoni</p></li>
                            <li style="list-style: disc;"><p>Salami</p></li>
                            <li style="list-style: disc;"><p>Jamon</p></li>
                            <li style="list-style: disc;"><p>Tocino</p></li>
                            <li style="list-style: disc;"><p>Arrachera</p></li>
                            <li style="list-style: disc;"><p>Chistorra</p></li>
                            <li style="list-style: disc;"><p>Salchicha</p></li>
                            <li style="list-style: disc;"><p>Chorizo</p></li>
                          </ul>

                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            <div class="col ">
                <div class="card mb-3 text-bg-dark d-block mx-auto" style="width: 80%;">
                    <div class="row g-0">
                      <div class="col-md-6">
                        <div class="card-body">
                          <h3 class="card-title text-center" style="font-family:Pacifico; font-style:italic;">Vegetales</h5>
                          <ul class="">
                            <li style="list-style: disc;"><p>Jitomate</p></li>
                            <li style="list-style: disc;"><p>Champiñon</p></li>
                            <li style="list-style: disc;"><p>Morron</p></li>
                            <li style="list-style: disc;"><p>Piña</p></li>
                            <li style="list-style: disc;"><p>Cebolla</p></li>
                            <li style="list-style: disc;"><p>Aceituna Negra</p></li>

                          </ul>

                        </div>
                      </div>
                      <div class="col-md-6">
                        <img src="https://p4.wallpaperbetter.com/wallpaper/878/732/874/food-wooden-surface-spoon-tomatoes-wallpaper-preview.jpg" class="img-fluid rounded-start" alt="..." style="height:100% ">
                      </div>
                    </div>
                  </div>
            </div>

            <div class="col ">
                <div class="card mb-3 text-bg-dark d-block mx-auto" style="width: 80%;">
                    <div class="row g-0">
                      <div class="col-md-6">
                        <img src="https://img.freepik.com/foto-gratis/vista-superior-queso-gourmet-miel-uvas_23-2148430149.jpg?w=2000" class="img-fluid rounded-start" alt="..." style="height:100% ">
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <h3 class="card-title text-center" style="font-family:Pacifico; font-style:italic;">Quesos</h3>
                          <ul class="">
                            <li style="list-style: disc;"><p>Queso Azul</p></li>
                            <li style="list-style: disc;"><p>Queso Parmesano</p></li>
                            <li style="list-style: disc;"><p>Queso Cabra</p></li>
                          </ul>

                        </div>
                      </div>
                    </div>
                  </div>
            </div>


  </div>
</div>
@endsection
