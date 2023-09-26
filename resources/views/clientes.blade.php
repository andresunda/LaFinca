@extends('layouts.layout')
@section('content')
<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Clientes</h1>
        <br>
        <div style="min-height: 70px;">
          @if (Session::has('mensaje'))
          <div class="alert alert-success  alert-dismissible fade show" role="alert">
              {{Session::get('mensaje')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif

          @if ($errors->any())
          <div class="alert alert-danger alert-dismissible fade show">
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
          </div>
        <div class="row">
            <div class="col-lg-9">
                <input class="form-control form-control-lg" id="text" type="text" placeholder="Buscar por nombre..." aria-label=".form-control-lg example">
            <br>
            </div>
            <div class="col-lg-3">
                <div class="d-grid gap-2">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fa-solid fa-plus"></i> Agregar Cliente
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
            <div class="card-body">
                <h1>Agregar cliente</h1>
                <br>
                <br>
                

                <form action="{{route('agregarCliente')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control form-control-lg" value="{{old('nombre')}}" name="nombre">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Apellido Paterno</label>
                      <input type="text" class="form-control form-control-lg" value="{{old('apellido_paterno')}}" name="apellido_paterno">
                    </div>

                    <div class="mb-3">
                      <label class="form-label">Apellido Materno</label>
                      <input type="text" class="form-control form-control-lg" value="{{old('apellido_materno')}}" name="apellido_materno">
                    </div>


                    <div class="mb-3">
                      <label class="form-label">Teléfono</label>
                      <input type="number" maxlength="10" class="form-control form-control-lg" value="{{old('teléfono')}}" name="teléfono">

                    </div>

              
                    <br>
                    <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Agregar cliente</button>
                    </div>
                </form>
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

        

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Crear Pedido</th>
                    <th scope="col">Modificar cliente</th>
                    <th scope="col">Eliminar cliente</th>
                  </tr>
                </thead>
                <tbody id="resultados" class="table-group-divider">
                </tbody>
                <tbody class="table-group-divider">

                @include('pages.clientes')

              </tbody>
              </table>
        </div>

        <br>

        {{$clientes->render()}}

    </div>
</div>

<script>
    window.addEventListener('load', function(){
      document.getElementById("text").addEventListener("keyup", () => {
        if((document.getElementById("text").value.length)>=1)
        fetch(`/clientes/search?text=${document.getElementById("text").value}`,{method:'get' })
        .then(response => response.text())
        .then(html => {document.getElementById("resultados").innerHTML = html })
        else
        document.getElementById("resultados").innerHTML = ""
      })
    });
  </script>
@endsection
