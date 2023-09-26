@extends('layouts.layout')
@section('content')
<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Productos</h1>
        <br>
        <div class="row">
            <div class="col-lg-9">
                <input class="form-control form-control-lg" id="text" type="text" placeholder="Buscar por nombre..." aria-label=".form-control-lg example">
            <br>
            </div>
            <div class="col-lg-3">
                <div class="d-grid gap-2">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modal1">
    <i class="fa-solid fa-plus"></i> Agregar Producto
  </button>

  <!-- Modal -->
  <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
            <div class="card-body">
                <div class="card-body">
                    <h1>Agregar producto</h1>
                    <br>
                    <br>

                    <form action="{{route('agregarProductos')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="img" class="form-label">Subir img</label>
                            <input type="file" class="form-control form-control-lg" value="{{old('img')}}" name="img">
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Nombre/Especialidad producto</label>
                            <input type="text" class="form-control form-control-lg" value="{{old('nombre_producto')}}" name="nombre_producto">

                        </div>

                        <div class="mb-3">
                            <label class="form-label"> Breve descripción</label>
                            <input type="text" class="form-control form-control-lg" value="{{old('descripcion')}}" name="descripcion">

                        </div>

                        <label class="form-label">Categoria del producto</label>
                        <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="categoria_producto" required>
                            <option value="pizzas">Pizzas</option>
                            <option value="pepitos">Pepitos</option>
                            <option value="otros">Otros</option>
                          </select>

                          <div class="mb-3">
                            <label class="form-label">Precio chica</label>
                            <input type="number" maxlength="10" class="form-control form-control-lg" value="{{old('precio_chica')}}" name="precio_chica">
                        </div>
z
                        <div class="mb-3">
                          <label class="form-label">Precio grande</label>
                          <input type="number" maxlength="10" class="form-control form-control-lg" value="{{old('precio_grande')}}" name="precio_grande">
                        </div>

                        <br>
                        <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Agregar producto</button>
                        </div>
                    </form>
            <br>
                </div>
        <br>
            </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


                </div>
            </div>
        </div>

  <!-------------BLOQUE DE VALIDACION DE ERRORES------------->
  <div style="min-height: 70px;">
    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Precio CH</th>
                    <th scope="col">Precio GDE</th>
                    <th scope="col">Img</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody id="resultados" class="table-group-divider">
                </tbody>
                <tbody class="table-group-divider">

                    @include('pages.productos')


              </tbody>
              </table>
        </div>

        <br>
        {{$productos->render()}}


    </div>
</div>

<script>
    window.addEventListener('load', function(){
      document.getElementById("text").addEventListener("keyup", () => {
        if((document.getElementById("text").value.length)>=1)
        fetch(`/productos/search?text=${document.getElementById("text").value}`,{method:'get' })
        .then(response => response.text())
        .then(html => {document.getElementById("resultados").innerHTML = html })
        else
        document.getElementById("resultados").innerHTML = ""
      })
    });
  </script>


@endsection
